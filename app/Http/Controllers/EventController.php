<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Contact;
use App\Club;
use App\Event;
use App\EventMember;
use App\EventPrice;
use App\Role;
use App\Roleship;
use App\TransactionForEvent;
use App\User;

class EventController extends Controller{

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
            $event -> access = $request -> input( 'event_access' );
            $event -> club_id = session('theClubID');
            $event -> creater_user_id = Auth::id();
            $memberLimit = $request -> input( 'event_memberlimit' );
            if( null == $memberLimit ) $memberLimit = 9999;
            $event -> member_limit = $memberLimit;
            $event -> contact_id = $contact -> id;
            if( 'on' == $request -> input( 'disp_guest' ) ){
                $event -> guest_display =  1;
            }else{
                $event -> guest_display =  0;
            }
            $event -> save();

            return back()
                -> with('message', 'Welcome! Event created successfully.');
        }
    }

    public function updateEvent(Request $request){

        $event = Event::find(Session::get('eventId'));
        $contact = Contact::find($event -> contact_id);
        if( $request -> input( 'event_name' ) != '' ){
            $event -> name = $request -> input( 'event_name' );
        }else
            echo 'name wrong';
        if( $request -> input( 'event_slug' ) != '' ){
            $event -> slug = $request -> input( 'event_slug' );
        }else
            echo 'slug wrong';
        if( $request -> input( 'event_desc_pub' ) != '' ){
            $event -> description = $request -> input( 'event_desc_pub' );
        }else
            echo 'pub wrong';
        if( $request -> input( 'event_desc_prv' ) != '' ){
            $event -> short_description = $request -> input( 'event_desc_prv' );
        }else
            echo 'prv wrong';

        if( $request -> input( 'event_access' ) != '' ){
            $event -> access = $request -> input( 'event_access' );
        }else
            echo 'type wrong';

        if( 'on' == $request -> input( 'dg' ) ){
            $event -> guest_display =  1;
        }else{
            $event -> guest_display =  0;
        }

        if( $request -> input( 'zip_code' ) ){
            $contact -> zipcode = $request -> input( 'zip_code' );
        }else
            echo 'zcod wrong';

        if( $request -> hasFile('event_logo') ){
            $this -> validate($request, [
                'event_logo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $logoName = time().'.'.$request -> event_logo -> getClientOriginalExtension();
            $request -> file('event_logo') -> move(public_path('uploads/images'), $logoName);
            $imagePath = asset('uploads/images/')."/".$logoName;
            $event -> event_path = $imagePath;
        }
        $contact -> save();
        $event -> save();

        return back()
//            -> withErrors('msg', 'The Message')
            -> with('active_tab', $request -> active_tab)
            ;
    }

    public function readEvent($slug){

        $event = Event::where('slug', '=', $slug) -> first();
        session(['eventId' => $event -> id]);

        $club = Club::find($event -> club_id);

        $isAlreadyEventMember = EventMember::where('event_id', $event -> id)
            -> where('user_id', Auth::id())
            -> first();
        $role = NULL;
        $eventPrices = NULL;

        $roleship = Roleship::where('user_id', Auth::id()) -> where('club_id', $event -> club_id) -> first();
        if(!is_null($roleship)){
            $role = Role::find($roleship -> role_id) -> role_description;
        }

        if(is_null($isAlreadyEventMember)){
            Session::set('stripe_secret_key', $club -> stripe_pvt_key);

            if('owner' == $role || 'admin' == $role){
                $eventPrices = EventPrice::where('event_id', $event->id)
                    -> select('*')
                    -> get();
            }elseif('member' == $role) {
                $eventPrices = EventPrice::where('event_id', $event->id)
                    -> where('members_only', '1')
                    ->select('*')
                    ->get();
            }else{
                $eventPrices = EventPrice::where('event_id', $event->id)
                    -> where('members_only', '0')
                    -> select('*')
                    -> get();
            }
        }else{
            Session::set('stripe_secret_key', NULL);
        }

        $theContact = Contact::find($event -> contact_id);

        $pcm_id = $theContact -> pcm_id;
        $scm_id = $theContact -> scm_id;

        if($pcm_id != '' && $pcm_id != 'None'){
            $thePCM = User::find($pcm_id);
        }
        else{
            $thePCM = NULL;
        }

        if($scm_id != '' && $scm_id != 'None'){
            $theSCM = User::find($scm_id);
        }else{
            $theSCM = NULL;
        }

        $eventMembers = DB::table('event_members')
            -> where('event_id', '=', $event->id)
            -> join('users', 'users.id', '=', 'event_members.user_id')
            -> select('users.id', 'users.email', 'users.first_name', 'users.last_name', 'users.profile_image', 'event_members.invited', 'event_members.created_at as invite_date', 'event_members.updated_at as accept_date')
            -> get();
        $trForEvent = DB::table('transaction_for_cevent')
            ->join('event_price', 'transaction_for_cevent.event_price_id', '=', 'event_price.id')
            ->where('event_price.event_id', $event->id)
            ->join('users', 'transaction_for_cevent.user_id', '=', 'users.id')
            ->select('transaction_for_cevent.date', 'users.first_name', 'users.last_name', 'transaction_for_cevent.amount', 'transaction_for_cevent.source', 'transaction_for_cevent.receipt')
            ->get();

        return view('event/eventManagement', [
            'page' => 'Event Management',
            'isAlreadyEventMember' => $isAlreadyEventMember,
            'event' => $event,
            'theUserRole' => $role,
            'theClub' => $club,
            'eventPrices' => $eventPrices,
            'stripe_public_key' => $club -> stripe_pub_key,
            'theContact' => $theContact,
            'thePCM' => $thePCM,
            'theSCM' => $theSCM,
            'eventMembers' => $eventMembers,
            'transForEvent' => $trForEvent
        ]);
    }

    public function readEventDates(){
        if(Auth::check()){
            $publicEventDates = DB::table('events')
                -> where('events.club_id', session('theClubID'))
                -> where('access', 'Public')
                -> select('events.name', 'events.start_date', 'events.end_date')
                -> get();
            $membersOnlyEventDates = DB::table('events')
                -> where('events.club_id', session('theClubID'))
                -> where('events.access', 'Members Only')
                -> join('roleships', 'roleships.club_id', '=', 'events.club_id')
                -> where('roleships.user_id', '=', Auth::id())
                -> where('roleships.role_id', '>', 1)
                -> where('roleships.role_id', '<', 5)
                -> select('events.name', 'events.start_date', 'events.end_date')
                -> get();
            $inviteOnlyMemberEventDates = DB::table('events')
                -> where('events.club_id', session('theClubID'))
                -> where('events.access', 'Invite Only')
                -> join('event_members', 'event_members.event_id', '=', 'events.id')
                -> where('event_members.user_id', '=', Auth::id())
                -> where('event_members.invited', '=', 1)
                -> select('events.name', 'events.start_date', 'events.end_date')
                -> get();
            $inviteOnlyAdminEventDates = DB::table('events')
                -> where('events.club_id', session('theClubID'))
                -> where('events.access', 'Invite Only')
                -> join('roleships', 'roleships.club_id', '=', 'events.club_id')
                -> where('roleships.user_id', '=', Auth::id())
                -> where('roleships.role_id', '>', 1)
                -> where('roleships.role_id', '<', 4)
                -> select('events.name', 'events.start_date', 'events.end_date')
                -> get();
            $eventDates = $publicEventDates -> merge($membersOnlyEventDates);
            $eventDates = $eventDates -> merge($inviteOnlyMemberEventDates);
            $eventDates = $eventDates -> merge($inviteOnlyAdminEventDates);

        }else{
            $eventDates = DB::table('events')
                -> where('events.club_id', session('theClubID'))
                -> where('access', 'Public')
                -> select('events.name', 'events.start_date', 'events.end_date')
                -> get();
        }
        $obj = array();
        foreach($eventDates as $event){
            $e = $event -> name;
            $arr = array(
                'title' => $event -> name,
                'start' => $event ->start_date,
                'end' => $event -> end_date
            );
            array_push($obj, $arr);
        }
        $events = json_encode($obj);
        echo $events;
    }

    public function inviteAMember(Request $request){

        $isExist = User::where('first_name', $request -> input( 'first_name' )) ->
        where('last_name', $request -> input( 'last_name' )) ->
        where('email', $request -> input( 'email' )) -> count();

        if( $isExist > 0 ){

            $user = User::where('first_name', $request -> input( 'first_name' )) ->
            where('last_name', $request -> input( 'last_name' )) ->
            where('email', $request -> input( 'email' )) -> first();

            if($user -> id == Auth::id())
            {
                return back()
                    -> with('active_tab',  $request -> active_tab)
                    -> with('members_msg', 'can not invite yourself');
            }
            else{
                $eventMembers = new EventMember;
                $eventMembers -> user_id = $user -> id ;
                $eventMembers -> event_id = session('eventId');
                $eventMembers -> invited = 1;
                $eventMembers -> save();
                return back() -> with('active_tab',  $request -> active_tab);
            }
        }
        else{
            return back()
                -> with('active_tab',  $request -> active_tab)
                -> with('members_msg', 'the user does not exist');
        }
    }

    public function readAllEvents(){

        $allEvents = DB::table('events')
            ->join('contacts', 'contacts.id', '=', 'events.contact_id')
            ->leftJoin('roleships', function($join){
                $join->on('events.club_id', '=', 'roleships.club_id')
                    ->where('roleships.user_id', '=', Auth::id());
            })
            ->leftJoin('membership_plans', 'membership_plans.club_id', '=', 'events.club_id')
            ->leftJoin('online_members', function($join){
                $join->on('online_members.membership_plan_id', '=', 'membership_plans.id')
                    ->where('online_members.user_id', '=', Auth::id());
            })
            ->leftJoin('event_members', function($join){
                $join->on('event_members.event_id', '=', 'events.id')
                    ->where('event_members.user_id', '=', Auth::id());
            })
            ->select('events.id', 'events.name', 'events.slug', 'events.logo_path', 'events.description', 'events.access', 'contacts.city', 'contacts.state', 'contacts.country', 'roleships.role_id', 'online_members.user_id', 'event_members.invited')
            ->get()
            ->unique();

        return view('event/allEvents', [
            'page' => 'allEvents',
            'allEvents' => $allEvents
        ]);
    }

    public function readMyEvents(){

        $adminEvents = DB::table('events')
            -> join('roleships', 'roleships.club_id', '=', 'events.club_id')
            -> where('roleships.user_id', '=', Auth::id())
            -> where('roleships.role_id', '>', 1)
            -> where('roleships.role_id', '<', 4)
            -> select('events.slug', 'events.name', 'events.logo_path', 'events.created_at')
            -> get()
            -> unique();

        $memberEvents = DB::table('event_members')
            -> where('event_members.user_id', Auth::id())
            -> where('event_members.invited', 0)
            -> join('events', 'event_members.event_id', '=', 'events.id')
            -> select('events.slug', 'events.name', 'events.logo_path', 'events.created_at')
            -> get()
            -> unique();

        $myEvents = $adminEvents -> merge($memberEvents);

        return view('event/myEvents', [
            'page' => 'events',
            'myEvents' => $myEvents
        ]);
    }

    public function becomeAnEventMember($slug){

        $theEvent = Event::where('slug', '=', $slug)
            -> first();
        $theClub = Club::find($theEvent->club_id);
        Session::set('stripe_secret_key', $theClub->stripe_pvt_key);
        $theEventPrices = EventPrice::where('event_id', $theEvent->id)
            ->select('id', 'name', 'description', 'members_only', 'cost')
            ->get();
        $count = $theEventPrices->count();
        $isMember = DB::table('online_members')
            ->join('membership_plans', 'online_members.membership_plan_id', '=', 'membership_plans.id')
            ->where('online_members.user_id', Auth::id())
            ->where('membership_plans.club_id', $theEvent->club_id)
            ->count();
        $isInvited = EventMember::where('user_id', Auth::id())
            ->where('event_id', $theEvent->id)
            ->where('invited', 1)
            ->count();
        return view('event/becomeAnEventMember', [
            'page' => 'become an event member',
            'eventType' => $theEvent->access,
            'eventName' => $theEvent->name,
            'eventPrices' => $theEventPrices,
            'eventSlug' => $theEvent->slug,
            'count' => $count,
            'isMember' => $isMember,
            'isInvited' => $isInvited,
            'stripe_public_key' => $theClub->stripe_pub_key
        ]) -> with('msg', '');
    }

}
