<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Event;
use App\EventPrice;
use App\Club;
use App\Contact;
use App\Role;
use App\Roleship;
use App\TransactionForEvent;

class EventController extends Controller{

    public function addPrice(Request $request){
        $ePrice = new EventPrice;

        if( $request -> pName != '' ){
            $ePrice -> name = $request -> pName;
            if( $request -> pDesc != '' ){
                $ePrice -> description = $request -> pDesc;
                if( $request -> pCost != '' ){
                    $ePrice -> cost = $request -> pCost;
                    if( $request -> pMO != '' ){
                        $price_isMemberOnly = 1;
                    }else{
                        $price_isMemberOnly = 0;
                    }
                    $ePrice -> members_only = $price_isMemberOnly;
                    $ePrice -> event_id = Session::get('eventID');
                    $ePrice -> timestamps = false;
                    $ePrice -> save();
                    return back()
                        -> with('active_tab', $request -> active_tab);
                }else{
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'price cost missed');}
            }else
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'price description missed');
        }else{
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'price name missed');
        }
    }

    public function createEvent(Request $request){

        if( $request -> hasFile('event_logo') ){
            $this -> validate($request, [
                'event_logo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $logoName = time().'.'.$request -> event_logo -> getClientOriginalExtension();
            $request -> file('event_logo') -> move(public_path('uploads/images'), $logoName);
            $imagePath = asset('uploads/images')."/".$logoName;
        }
        else{
            $imagePath = asset('uploads/images')."/".'event.png';
        }

        $slug = Event::where('slug', '=', $request -> input( 'event_slug' ))->first();
        if ($slug !== null) {
            return back()
                -> with('message', 'The slug already exist. Failed to create the event.');
        }

        {
            $contact = new Contact;
            $contact -> zipcode = $request -> input( 'event_zipcode' );
            $contact -> city = $request -> input( 'event_city' );
            $contact -> state = $request -> input( 'event_state' );
            $contact -> save();

            $event = new Event;
            $event -> name = $request -> input( 'event_name' );
            $event -> slug = $request -> input( 'event_slug' );
            $event -> logo_path = $imagePath;
            $event -> description = $request -> input( 'event_description' );
            $event -> short_description = $request -> input( 'event_short_description' );
            $event -> start_date = $request -> input( 'event_start' );
            $event -> end_date = $request -> input( 'event_end' );
            $event -> access = $request -> input( 'event_type' );
            $event -> club_id = session('theClubID');
            $event -> creater_user_id = Auth::id();
            $memberLimit = $request -> input( 'event_memberlimit' );
            if( null == $memberLimit ) $memberLimit = 9999;
            $event -> member_limit = $memberLimit;
            $event -> contact_id = $contact -> id;
            $event -> save();

            return back()
                -> with('message', 'Welcome! Event created successfully.');
        }
    }

    public function eventCreate(){

        return view('event/createEvent')->with('page', 'createEvent');
    }

    public function eventManagement($slug){

        $event = Event::where('slug', '=', $slug) -> first();
        session(['eventID' => $event -> id]);

        $theRoleID = Roleship::where('user_id', Auth::id()) -> where('club_id', $event -> club_id) -> firstOrFail() -> role_id;
        $theUserRole = Role::find($theRoleID) -> role_description;
        $club = Club::find($event -> club_id);
        $eventPrices = EventPrice::where('event_id', $event->id)
            -> select('*')
            -> get();
        $theContact = Contact::find($event -> contact_id);
        $pcm_id = $theContact -> pcm_id;
        $scm_id = $theContact -> scm_id;
        if($pcm_id != '' && $pcm_id != 'None'){
            $thePCM = User::find($pcm_id);
            $thePCMRoleID = Roleship::where('user_id', $pcm_id) -> where('club_id', $club_id) -> first() -> role_id;
            $thePCMRole = Role::find($thePCMRoleID) -> role_description;
        }
        else{
            $thePCM = NULL;
            $thePCMRole = NULL;
        }
        if($scm_id != '' && $scm_id != 'None'){
            $theSCM = User::find($scm_id);
            $theSCMRoleID = Roleship::where('user_id', $scm_id) -> where('club_id', $club_id) -> first() -> role_id || NULL;
            $theSCMRole = Role::find($theSCMRoleID) -> role_description;
        }else{
            $theSCM = NULL;
            $theSCMRole = NULL;
        }

        return view('event/eventManagement', [
            'page' => 'Event Management',
            'event' => $event,
            'theUserRole' => $theUserRole,
            'theClub' => $club,
            'eventPrices' => $eventPrices,
            'stripe_public_key' => $club -> stripe_pub_key,
            'theContact' => $theContact,
            'thePCM' => $thePCM,
            'thePCMRole' => $thePCMRole,
            'theSCM' => $theSCM,
            'theSCMRole' => $theSCMRole
        ]);


    }

    public function getEventDates(Request $request){
        //echo 'here';
        $eventDate = json_encode(array(
            array(
                'title'=>'test',
                'start'=>'2017-07-02T12:00:00',
                'end'=>'2017-07-03T13:00:00'
            )
        ));
        echo $eventDate;
    }

    public function showAllEvents(){

        $allEvents = DB::table('events')
            -> join('contacts', 'contacts.id', '=', 'events.contact_id')
            -> join('clubs', 'clubs.id', '=', 'events.club_id')
            -> join('roleships', 'roleships.club_id', '=', 'clubs.id')
            -> join('users', 'users.id', '=', 'roleships.user_id')
            -> where('events.access', 'Public')
            -> orwhere(function($query){
                $query -> where('events.access', 'Members Only')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5)
                    -> where('users.id',  '=', Auth::id());
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Private')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 4)
                    -> where('users.id',  '=', Auth::id());
            })
            -> select('events.id', 'events.name', 'events.slug', 'events.logo_path', 'events.description', 'events.access', 'contacts.city', 'contacts.state', 'contacts.country')
            -> get()
            -> unique();

        $yourEvents = DB::table('events')
            -> join('contacts', 'contacts.id', '=', 'events.contact_id')
            -> join('clubs', 'clubs.id', '=', 'events.club_id')
            -> join('roleships', 'roleships.club_id', '=', 'clubs.id')
            -> join('users', 'users.id', '=', 'roleships.user_id')
            -> where('users.id', '=', Auth::id())
            -> where(function($query) {
                $query->where('events.access', 'Public')
                    ->where('roleships.role_id', '>', 1)
                    ->where('roleships.role_id', '<', 5);
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Members Only')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5);
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Private')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 4);
            })
            -> select('events.id')
            -> get()
            -> unique();

        return view('event/allEvents', [
            'page' => 'allEvents',
            'allEvents' => $allEvents,
            'yourEvents' => $yourEvents
        ]);
    }

    public function showMyEvents(){

        $myEvents = DB::table('events')
            -> join('user_event', 'user_event.event_id', '=', 'events.id')
            -> join('users', 'user_event.user_id', '=', 'users.id')
            -> join('roleships', 'roleships.user_id', '=', 'users.id')
            -> where('roleships.club_id', '=', 'events.club_id')
            -> where(function($query) {
                $query->where('events.access', 'Public')
                    ->where('roleships.role_id', '>', 1)
                    ->where('roleships.role_id', '<', 5)
                    ->where('users.id', '=', Auth::id());
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Members Only')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5)
                    -> where('users.id',  '=', Auth::id());
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Private')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 4)
                    -> where('users.id',  '=', Auth::id());
            })
            -> select('events.id')
            -> get()
            -> unique();

        return view('event/myEvents', [
            'page' => 'events',
            'myEvents' => $myEvents
        ]);
    }

}
