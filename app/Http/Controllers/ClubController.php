<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Contact;
use App\Club;
use App\Discount;
use App\Membership;
use App\MembershipPlan;
use App\Offline_member;
use App\Role;
use App\Roleship;
use App\TransactionForPlan;
use App\User;


class ClubController extends Controller{

    public function readMyClubs()
    {
        $theClubs = DB::table('users')
            -> where('users.id', Auth::id())
            -> join('roleships', 'users.id', '=', 'roleships.user_id')
            -> where('roleships.role_id', '<', 5)
            -> where('roleships.role_id', '>', 1)
            -> join('clubs', 'clubs.id', '=', 'roleships.club_id')
            -> select('clubs.name', 'clubs.slug', 'clubs.logo_path', 'clubs.created_at')
            -> get();

        return view('club/myClub', [
            'page' => 'clubs',
            'myClubs' => $theClubs
        ]);
    }

    public function readClub($slug)
    {
        $club_id = Club::where('slug', '=', $slug) -> first() -> id;

        session(['theClubID' => $club_id]);
        $theClub = Club::find($club_id);
        $clubEvents = DB::table('events')
            -> where('events.club_id', '=', $club_id)
            -> join('user_event', 'user_event.event_id', '=', 'events.id')
            -> join('users', 'user_event.user_id', '=', 'users.id')
            -> join('roleships', 'roleships.user_id', '=', 'users.id')
            -> where('roleships.club_id', '=', $club_id)
            -> where(function($query) {
                $query -> where('events.access', 'Public')
                    ->where('roleships.role_id', '>', 1)
                    ->where('roleships.role_id', '<', 5);
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Members Only')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5)
                    -> where('users.id', '=', Auth::id());
            })
            -> orwhere(function($query){
                $query -> where('events.access', 'Private')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 4)
                    -> where('users.id', '=', Auth::id());
            })
            -> select('events.name', 'events.start_date', 'events.description')
            -> get()
            -> unique();

        $theClubOnlineMembers = DB::table('users')
            -> join('online_members', 'online_members.user_id', '=', 'users.id')
            -> join('roleships', 'roleships.user_id', '=', 'users.id')
            -> join('roles', 'roles.id', '=', 'roleships.role_id')
            -> where('roleships.club_id', $club_id)
            -> select('users.*', 'online_members.join_date', 'online_members.expiration_date', 'roles.role_description')
            -> get();

        $theRoleID = Roleship::where('user_id', Auth::id()) -> where('club_id', $club_id) -> firstOrFail() -> role_id;
        $theUserRole = Role::find($theRoleID) -> role_description;
        $theContact = Contact::find($theClub -> contact_id);
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
        $offlineMembers = Offline_member::where('club_id', $club_id) -> get();
        $expDate = '';
        if( !($theUserRole == 'owner' || $theUserRole == 'admin') ){
            //$dxpDate =
        }

        $trForPlan = DB::table('transaction_for_mplan')
                        ->join('membership_plans', 'transaction_for_mplan.plan_id', '=', 'membership_plans.id')
                        ->where('membership_Plans.club_id', $club_id)
                        ->join('users', 'transaction_for_mplan.user_id', '=', 'users.id')
                        ->select('transaction_for_mplan.date', 'users.first_name', 'users.last_name', 'transaction_for_mplan.amount', 'transaction_for_mplan.source', 'membership_plans.name as plan_name', 'transaction_for_mplan.receipt')
                        ->get();
        $discounts = Discount::all();
        $clubOwnnersForMembersTab = DB::table('roleships')
            -> join('users', 'roleships.user_id', '=', 'users.id')
            -> join('roles', 'roleships.role_id', '=', 'roles.id')
            -> where('roleships.role_id', 2)
            -> where('roleships.club_id', $club_id)
            -> select('users.profile_image', 'users.id', 'users.first_name', 'users.last_name', 'roles.role_description', 'users.created_at')
            -> get();
        $clubAdminsForMembersTab = DB::table('roleships')
            -> join('users', 'roleships.user_id', '=', 'users.id')
            -> join('roles', 'roleships.role_id', '=', 'roles.id')
            -> where('roleships.role_id', 3)
            -> where('roleships.club_id', $club_id)
            -> select('users.profile_image', 'users.id', 'users.first_name', 'users.last_name', 'roles.role_description', 'users.created_at')
            -> get();
        $visibleEvents = null;
//        DB::table('events')
//            -> where('club_id', $club_id)
//            ->
        if(Auth::check()){
            $publicEventDates = DB::table('events')
                -> where('events.club_id', $club_id)
                -> where('access', 'Public')
                -> select('events.name', 'events.start_date', 'events.end_date', 'events.description', 'events.slug')
                -> get();
            $membersOnlyEventDates = DB::table('events')
                -> where('events.club_id', $club_id)
                -> where('events.access', 'Members Only')
                -> join('roleships', 'roleships.club_id', '=', 'events.club_id')
                -> where('roleships.user_id', '=', Auth::id())
                -> where('roleships.role_id', '>', 1)
                -> where('roleships.role_id', '<', 5)
                -> select('events.name', 'events.start_date', 'events.end_date', 'events.description', 'events.slug')
                -> get();
            $inviteOnlyMemberEventDates = DB::table('events')
                -> where('events.club_id', $club_id)
                -> where('events.access', 'Invite Only')
                -> join('event_members', 'event_members.event_id', '=', 'events.id')
                -> where('event_members.user_id', '=', Auth::id())
                -> where('event_members.invited', '=', 1)
                -> select('events.name', 'events.start_date', 'events.end_date', 'events.description', 'events.slug')
                -> get();
            $inviteOnlyAdminEventDates = DB::table('events')
                -> where('events.club_id', $club_id)
                -> where('events.access', 'Invite Only')
                -> join('roleships', 'roleships.club_id', '=', 'events.club_id')
                -> where('roleships.user_id', '=', Auth::id())
                -> where('roleships.role_id', '>', 1)
                -> where('roleships.role_id', '<', 4)
                -> select('events.name', 'events.start_date', 'events.end_date', 'events.description', 'events.slug')
                -> get();
            $eventDates = $publicEventDates -> merge($membersOnlyEventDates);
            $eventDates = $eventDates -> merge($inviteOnlyMemberEventDates);
            $eventDates = $eventDates -> merge($inviteOnlyAdminEventDates);

        }else{
            $eventDates = DB::table('events')
                -> where('events.club_id', session('club_id'))
                -> where('access', 'Public')
                -> select('events.name', 'events.start_date', 'events.end_date')
                -> get();
        }

        return view('club/clubManagement', [
            'page' => 'clubs',
            'theClub' => $theClub,
            'theClubUsers' => $theClub -> users,
            'theContact' => $theContact,
            'theUserRole' => $theUserRole,
            'yourMembershipExpDate' => $expDate,
            'thePCM' => $thePCM,
            'thePCMRole' => $thePCMRole,
            'theSCM' => $theSCM,
            'theSCMRole' => $theSCMRole,
            'clubEvents' => $clubEvents,
            'offlineMembers' => $offlineMembers,
            'onlineMembers' => $theClubOnlineMembers,
            'clubOwnnersForMembersTab' => $clubOwnnersForMembersTab,
            'clubAdminsForMembersTab' => $clubAdminsForMembersTab,
            'transForPlan' => $trForPlan,
            'discounts' => $discounts,
            'eventDates' => $eventDates
        ]);
    }

    public function createClub(Request $request)
    {
        if( $request -> hasFile('club_logo') ){
            $this -> validate($request, [
                'club_logo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $logoName = time().'.'.$request -> club_logo -> getClientOriginalExtension();
            $request -> file('club_logo') -> move(public_path('uploads/images'), $logoName);
            $imagePath = asset('uploads/images/')."/".$logoName;
        }
        else{
            $imagePath = asset('uploads/images/')."/".'club.png';
        }

        $slug = Club::where('slug', '=', $request -> input( 'club_slug' ))->first();
        if ($slug !== null) {
            return back()
            -> with('message', 'The slug already exist. Failed to create the club.');
        }
        else{

            $contact = new Contact;
            $contact -> zipcode = $request -> input( 'club_zipcode' );
            $contact -> city = $request -> input( 'club_city' );
            $contact -> state = $request -> input( 'club_state' );
            $contact -> save();

            $club = new Club;
            $club -> name = $request -> input( 'club_name' );
            $club -> slug = $request -> input( 'club_slug' );
            $club -> description = $request -> input( 'club_description' );
            $club -> short_description = $request -> input( 'club_short_description' );
            $club -> website = $request -> input( 'club_url' );
            $club -> logo_path = $imagePath;
            $club -> phone_number = $request -> input( 'club_phone' );
            $club -> membership_limit = $request -> input( 'club_memberlimit' );
            $club -> type = $request -> input( 'club_type' );
            $club -> contact_id = $contact -> id;
            $club -> save();

            $roleship = new Roleship;
            $roleship -> user_id = Auth::id();
            $roleship -> club_id = $club -> id;
            $roleship -> role_id = 2;
            $roleship -> save();

            return back()
                -> with('message', 'Welcome! Club created successfully.');
        }
    }

    public function updateClub(Request $request){

        $club = Club::find(Session::get('theClubID'));
        $contact = Contact::find($club -> contact_id);
        if( $request -> input( 'club_name' ) != '' ){
            $club -> name = $request -> input( 'club_name' );
        }else
            echo 'name wrong';
        if( $request -> input( 'club_slug' ) != '' ){
            $club -> slug = $request -> input( 'club_slug' );
        }else
            echo 'slug wrong';
        if( $request -> input( 'club_desc_pub' ) != '' ){
            $club -> description = $request -> input( 'club_desc_pub' );
        }else
            echo 'pub wrong';
        if( $request -> input( 'club_desc_prv' ) != '' ){
            $club -> short_description = $request -> input( 'club_desc_prv' );
        }else
            echo 'prv wrong';

        if( $request -> input( 'club_type' ) != '' ){
            $club -> type = $request -> input( 'club_type' );
        }else
            echo 'type wrong';

        if( $request -> input( 'zip_code' ) ){
            $contact -> zipcode = $request -> input( 'zip_code' );
        }else
            echo 'zcod wrong';

        if( $request -> hasFile('club_logo') ){
            $this -> validate($request, [
                'club_logo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $logoName = time().'.'.$request -> club_logo -> getClientOriginalExtension();
            $request -> file('club_logo') -> move(public_path('uploads/images'), $logoName);
            $imagePath = asset('uploads/images/')."/".$logoName;
            $club -> logo_path = $imagePath;
        }

        $club -> stripe_pub_key = $request ->str_pub_key;
        $club -> stripe_pvt_key = $request ->str_pvt_key;

        $contact -> save();
        $club -> save();

        return back()
//            -> withErrors('msg', 'The Message')
            -> with('active_tab', $request -> active_tab);
    }

    public function updateClubMessage(Request $request)
    {
        if(Session::has('club_id'))
        {
            try {
                Club::where('club_id', Session::get('club_id'))
                    ->update([
                        'club_message' => $request->club_message,
                        'club_renewal_message' => $request->club_renewal_message
                    ]);

            }catch (\Exception $e)
            {
                return redirect()->back()
                    ->with('status', 'danger')
                    ->with('message', 'Update message failed with'.$e->getMessage());
            }

            return redirect()->back()
                ->with('status', 'success')
                ->with('message', 'Successfully updated your club message');
        }
        else{
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Please create your club first');
        }
    }

    public function readAllClubs()
    {
        $allClubs = DB::table('clubs')
            -> join('contacts', 'contacts.id', '=', 'clubs.contact_id')
            -> select('clubs.id', 'clubs.name', 'clubs.slug', 'clubs.logo_path', 'clubs.description', 'clubs.website', 'clubs.access', 'contacts.city', 'contacts.state', 'contacts.country')
            -> get()
            -> unique();

        $yourClubs = DB::table('clubs')
            -> join('roleships', 'roleships.club_id', '=', 'clubs.id')
            -> join('users', 'roleships.user_id', '=', 'users.id')
            -> where('users.id',  '=', Auth::id())
            -> where('roleships.role_id', '>', 1)
            -> where(function($query){
                $query -> where('clubs.type', 'Private Club')
                    -> where('roleships.role_id', '<', 4);
            })
            -> orwhere(function($query){
                $query -> where('clubs.type', '!=', 'Private Club')
                    -> where('roleships.role_id', '<', 5);
            })
            -> select('clubs.id')
            -> get()
            -> unique();

        return view('club/allClubs', [
            'page' => 'allClubs',
            'allClubs' => $allClubs,
            'yourClubs' => $yourClubs
        ]);
    }
}
