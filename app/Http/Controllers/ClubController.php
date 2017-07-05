<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use App\User;
use App\Club;
use App\Roleship;
use App\Role;
use App\Membership_plan;
use App\Membership;
use App\Contact;
use App\Offline_member;
use App\Discount;
use App\TransactionForPlan;


class ClubController extends Controller
{
    public function addDiscount(Request $request){

        $discount = new Discount;

        $discount -> name = $request -> discount_name;
        $discount -> type = $request -> discount_type;
        $discount -> amount = $request -> discount_amount;
        $discount -> expDate = $request -> discount_exp;
        $discount -> applyTo = $request -> discount_apply;
        $discount -> uses = $request -> discount_uses;

        $discount -> save();
    }

    public function showMyClubs()
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

    public function clubManagement($slug)
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
            -> join('memberships', 'memberships.user_id', '=', 'users.id')
            -> join('roleships', 'roleships.user_id', '=', 'users.id')
            -> join('roles', 'roles.id', '=', 'roleships.role_id')
            -> where('roleships.club_id', $club_id)
            -> select('users.*', 'memberships.join_date', 'memberships.expiration_date', 'roles.role_description')
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
                        ->where('membership_plans.club_id', $club_id)
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
            'discounts' => $discounts
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

    public function configureClub(Request $request){

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

        $contact -> save();
        $club -> save();

        return back()
//            -> withErrors('msg', 'The Message')
            -> with('active_tab', $request -> active_tab)
            ;
    }

    public function inviteNew(Request $request){

        $isExist = User::where('first_name', $request -> input( 'first_name' )) ->
        where('last_name', $request -> input( 'last_name' )) ->
        where('email', $request -> input( 'email' )) -> count();

        if( $isExist > 0 ){

            $user = User::where('first_name', $request -> input( 'first_name' )) ->
            where('last_name', $request -> input( 'last_name' )) ->
            where('email', $request -> input( 'email' )) -> firstOrFail();

            if($user -> id == Auth::id())
            {
                return back()
                    -> with('active_tab',  $request -> active_tab)
                    -> with('members_msg', 'can not invite yourself');
            }
            else{
                $roleship = new Roleship;
                $roleship -> user_id = $user -> id ;
                $roleship -> club_id = session('theClubID');
                $roleship -> role_id = 5;
                $roleship -> save();
                return back() -> with('active_tab',  $request -> active_tab);
            }
        }
        else{
            return back()
                -> with('active_tab',  $request -> active_tab)
                -> with('members_msg', 'the user does not exist');
        }
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

    public function showConfigClub($id)
    {
        $club = Club::find($id);

        //Check if user is admin of this club with club_id is $id
        $user_role = Roleship::where([
            'user_id' => Session::get('userid'),
            'club_id' => $id
        ])->first()->user_role;

        $is_admin = 0;
        if($user_role == 0 || $user_role == 1)
        {
            $is_admin = 1;
        }

        Session::put('club_id', $id);


        return view('club/configclub', [
            'club' => $club,
            'is_admin' => $is_admin
        ])->with('page', 'myclub');
    }

    public function contactUpdate(Request $request)
    {
        $contact = Contact::find(Club::find(session('theClubID')) -> contact_id);

        $contact -> city = $request -> city;
        $contact -> state = $request -> state;
        $contact -> zipcode = $request -> zipcode;
        $contact -> pcm_id = $request -> pcmid;
        $contact -> scm_id = $request -> scmid;
        $contact -> linkedin = $request -> inLink;
        $contact -> level_in = $request -> inLevel;
        $contact -> twitter = $request -> ttLink;
        $contact -> level_t = $request -> ttLevel;
        $contact -> facebook = $request -> fbLink;
        $contact -> level_f = $request -> fbLevel;
        $contact -> youtube = $request -> ytLink;
        $contact -> level_y = $request -> ytLevel;
        $contact -> googleplus = $request -> goLink;
        $contact -> level_g = $request -> goLevel;
        $contact -> mail = $request -> maLink;
        $contact -> level_m = $request -> maLevel;

        $contact -> save();

        return back()
            -> with('active_tab', $request -> active_tab);

    }

    public function membershipPlanAdd(Request $request){

        $mPlan = new Membership_plan;

        if( $request -> pName != '' ){
            $mPlan -> name = $request -> pName;
            if( $request -> pDesc != '' ){
                $mPlan -> description = $request -> pDesc;
                if( $request -> pDura != '' ){
                    $mPlan -> duration_quantity = $request -> pDura;
                    if( $request -> pDuraUnit != '' ){
                        $mPlan -> duration_unit = $request -> pDuraUnit;
                        if( $request -> pCost != '' ){
                            $mPlan -> cost = $request -> pCost;
                            if( $request -> pMO != '' ){
                                $plan_isMemberOnly = 'true';
                            }else{
                                $plan_isMemberOnly = 'false';
                            }
                            $mPlan -> is_for_members_only = $plan_isMemberOnly;
                            $mPlan -> club_id = Session::get('theClubID');
                            $mPlan -> save();
                            return back()
                                -> with('active_tab', $request -> active_tab);
                        }else
                            return back()
                                -> with('active_tab', $request -> active_tab)
                                -> with('plan_msg', 'plan cost missed');
                    }else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('plan_msg', 'plan duration unit missed');
                }else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'plan duration missed');
            }else
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'plan description missed');
        }else{
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'plan name missed');
        }
    }

    public function mPlanUpdate(Request $request)
    {

        if ($request->pId != '') {

            $mPlan = Membership_plan::find($request->pId);

            if( $request -> pName != '' ){
                $mPlan -> name = $request -> pName;
                if( $request -> pDesc != '' ){
                    $mPlan -> description = $request -> pDesc;
                    if( $request -> pDura != '' ){
                        $mPlan -> duration_quantity = $request -> pDura;
                        if( $request -> pDuraUnit != '' ){
                            $mPlan -> duration_unit = $request -> pDuraUnit;
                            if( $request -> pCost != '' ){
                                $mPlan -> cost = $request -> pCost;
                                if( $request -> pMO != '' ){
                                    $plan_isMemberOnly = 'true';
                                }else{
                                    $plan_isMemberOnly = 'false';
                                }
                                $mPlan -> is_for_members_only = $plan_isMemberOnly;
                                $mPlan -> club_id = Session::get('theClubID');
                                $mPlan -> save();
                                return back()
                                    -> with('active_tab', $request -> active_tab);
                            }else
                                return back()
                                    -> with('active_tab', $request -> active_tab)
                                    -> with('plan_msg', 'plan cost missed');
                        }else
                            return back()
                                -> with('active_tab', $request -> active_tab)
                                -> with('plan_msg', 'plan duration unit missed');
                    }else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('plan_msg', 'plan duration missed');
                }else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'plan description missed');
            }else{
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'plan name missed');
            }

        } else
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'unexpected exception with plan ID');
    }

    public function import(Request $request){

        if( $request -> has('m_name_first') ){
            $fname = $request -> input('m_name_first');
            if( $request -> has('m_name_last') ){
                $lname = $request -> input('m_name_last');
                if( $request -> has('m_email') ){
                    $eMail = $request -> input('m_email');
                    if( $request -> has('m_join_date') ){
                        $jDate = $request -> input('m_join_date');
                        if( $request -> has('m_exp_date') ){
                            $eDate = $request -> input('m_exp_date');
                            $oMember = new Offline_member;
                            $oMember -> fname = $fname;
                            $oMember -> lname = $lname;
                            $oMember -> email = $eMail;
                            $oMember -> joinDate = $jDate;
                            $oMember -> expDate = $eDate;
                            $oMember -> claimer_id = Auth::id();
                            $oMember -> club_id = Session::get('theClubID');
                            $oMember -> save();
                        }
                        else
                            return back()
                                -> with('active_tab', $request -> active_tab)
                                -> with('members_msg', 'expiration date missed');
                    }
                    else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('members_msg', 'joined date missed');
                }
                else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('members_msg', 'email missed');
            }
            else
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('members_msg', 'member last name missed');
        }
        else{
            if( $request -> hasFile('csv_files') ){
                $this -> validate($request, [
                    'csv_files' => 'mimes:csv,txt',]);

                $csvName = time().'.'.$request -> csv_files -> getClientOriginalExtension();
                $request -> file('csv_files') -> move(public_path('uploads/csvs'), $csvName);

                $file = fopen('uploads/csvs/'.$csvName, "r");
                while ( ($data = fgetcsv($file)) !==FALSE ){

                    $no = $data[0];
                    if($no == 'No'){
                        continue;
                    }
                    else{
                        $oMember = new Offline_member;
                        $oMember -> fname = $data[1];
                        $oMember -> lname = $data[2];
                        $oMember -> email = $data[3];
                        $oMember -> joinDate = date('Y-m-d H:i:s', date_create_from_format('m/d/Y:H:i:s', $data[4].':00:00:00') -> getTimestamp());
                        $oMember -> expDate = date('Y-m-d H:i:s', date_create_from_format('m/d/Y:H:i:s', $data[5].':00:00:00') -> getTimestamp());
                        $oMember -> claimer_id = Auth::id();
                        $oMember -> club_id = Session::get('theClubID');
                        //$oMember -> membership_plan_id = $data[6];
                        $oMember -> save();
                    }
                }
                fclose($file);
            }
            else{
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('members_msg', 'no input data');
            }
        }
    }

    public function showAllClubs()
    {
        $allClubs = DB::table('clubs')
            -> join('contacts', 'contacts.id', '=', 'clubs.contact_id')
            -> join('roleships', 'roleships.club_id', '=', 'clubs.id')
            -> join('users', 'roleships.user_id', '=', 'users.id')
            -> where('clubs.access', 'Public')
            -> orwhere(function($query){
                $query -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5)
                    -> where('users.id',  '=', Auth::id())
                    -> where('clubs.access', 'Members Only');
            })
            -> orwhere(function($query){
                $query -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 4)
                    -> where('users.id',  '=', Auth::id())
                    -> where('clubs.access', 'Private');
            })
            -> select('clubs.id', 'clubs.name', 'clubs.slug', 'clubs.logo_path', 'clubs.description', 'clubs.website', 'clubs.access', 'contacts.city', 'contacts.state', 'contacts.country')
            -> get()
            -> unique();

        $yourClubs = DB::table('clubs')
            -> join('roleships', 'roleships.club_id', '=', 'clubs.id')
            -> join('users', 'roleships.user_id', '=', 'users.id')
            -> where(function($query){
                $query -> where('clubs.access', 'Public')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5)
                    -> where('users.id',  '=', Auth::id());
            })
            -> orwhere(function($query){
                $query -> where('clubs.access', 'Members Only')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 5)
                    -> where('users.id',  '=', Auth::id());
            })
            -> orwhere(function($query){
                $query -> where('clubs.access', 'Private')
                    -> where('roleships.role_id', '>', 1)
                    -> where('roleships.role_id', '<', 4)
                    -> where('users.id',  '=', Auth::id());
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

    public function becomeAMember($slug){
        if( Auth::check() ){
            $theClub = Club::where('slug', '=', $slug)
                -> first();
            Session::set('stripe_secret_key', $theClub -> stripe_pvt_key);
            Session::set('clubID', $theClub -> id);
            $roleship = Roleship::where('user_id', Auth::id()) -> where('club_id', $theClub -> id) -> first();
            $role = 'none';
            if( $roleship ){
                $role = Role::find( $roleship -> role_id ) -> role_description;
            }
            $count = 0;
            $clubMembershipPlans = $theClub -> membership_plans;
            foreach($clubMembershipPlans as $plan){
                $count++;
            }
            return view('club/becomeAMember', [
                'page' => 'become a member',
                'clubType' => $theClub -> type,
                'clubName' => $theClub -> name,
                'membershipPlans' => $theClub -> membership_plans,
                'count' => $count,
                'stripe_public_key' => $theClub -> stripe_pub_key,
                'role' => $role
            ]) -> with('msg', '');
        }
        else{

        }
    }

    public function stripeInfo(Request $request){

        $club = Club::find(Session::get('theClubID'));
        $club -> stripe_pub_key = $request ->str_pub_key;
        $club -> stripe_pvt_key = $request ->str_pvt_key;
        $club -> save();

        return back();
    }

    public function enterManual(Request $request){

        $applyTo = $request -> applyTo;
        if( substr($applyTo,0, 16) == 'membership_plan:' ){
            $plan_id = (int)substr($applyTo,16);
            $user = $request -> user;
            if( substr($user,0, 7) == 'online:' ){
                $user_id = (int)substr($user, 7);
                $transForPlan = new TransactionForPlan;
                $transForPlan -> user_id = $user_id;
                $transForPlan -> plan_id = $plan_id;
                $transForPlan -> amount = $request -> mt_amount;
                $transForPlan -> source = 'cash';
                $transForPlan -> date = date("Y-m-d");
                $receipt_id = Auth::id();
                $receipt = User::find($receipt_id);
                $transForPlan -> receipt = $receipt -> first_name.' '.$receipt -> last_name;
                $transForPlan -> save();
            }
        }
    }

    public function payForMembership(Request $request){

        if($request -> has('stripeToken')){
            \Stripe\Stripe::setApiKey(Session::get('stripe_secret_key'));

            $token = $request -> stripeToken;

            $charge = \Stripe\Charge::create(array(
                "amount" => 100 * Membership_plan::find($request -> plan_id) -> cost,
                "currency" => "usd",
                "description" => "Example charge",
                "source" => $token,
            ));

            if($charge -> paid == true){

                $newRoleship = new Roleship;

                $newRoleship -> user_id = Auth::id();
                $newRoleship -> club_id = Membership_plan::find($request -> plan_id) -> club_id;
                $newRoleship -> role_id = 4;

                $newRoleship -> save();

                $newMembership = new Membership;
                $newMembership -> user_id = Auth::id();
                $newMembership -> membership_plan_id = $request -> plan_id;
                $newMembership -> join_date = date('Y-m-d');
                $duraUnit = Membership_plan::find($request -> plan_id) -> duration_unit;
                if( $duraUnit == 'Day(s)' ){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.Membership_plan::find($request -> plan_id) -> duration_quantity).' days');
                }
                else if($duraUnit == 'Month(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(Membership_plan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else if($duraUnit == 'Quater(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(3 * Membership_plan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else{}

                $newMembership -> save();

                return $this -> clubManagement(Club::find( Membership_plan::find($request -> plan_id) -> club_id) -> slug);

            }
            else{
                echo 123;
                return back() -> with('msg', 'payment failed');
            }
        }
        else{
            if( 0 == Membership_plan::find($request -> plan_id) -> cost ){
                $newRoleship = new Roleship;

                $newRoleship -> user_id = Auth::id();
                $newRoleship -> club_id = Membership_plan::find($request -> plan_id) -> club_id;
                $newRoleship -> role_id = 4;

                $newRoleship -> save();

                $newMembership = new Membership;
                $newMembership -> user_id = Auth::id();
                $newMembership -> membership_plan_id = $request -> plan_id;
                $newMembership -> join_date = date('Y-m-d');
                $duraUnit = Membership_plan::find($request -> plan_id) -> duration_unit;
                if( $duraUnit == 'Day(s)' ){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(Membership_plan::find($request -> plan_id) -> duration_quantity).' days'));
                }
                else if($duraUnit == 'Month(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(Membership_plan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else if($duraUnit == 'Quater(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(3 * Membership_plan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else{}

                $newMembership -> save();

                return $this -> clubManagement(Club::find( Membership_plan::find($request -> plan_id) -> club_id) -> slug);
            }
        }
    }

    public function dealRequest(Request $request){
        $roleship = Roleship::where('user_id', Auth::id()) -> where('club_id', Session::get('clubID')) -> first();
        $role = 'none';
        $msg = 'snap';
        echo $role;
        if( $roleship ){
            $role = Role::find( $roleship -> role_id ) -> role_description;
        }
        if($role == 'none'){

            $newRoleship = new Roleship;

            $newRoleship -> user_id = Auth::id();
            $newRoleship -> club_id = Session::get('clubID');
            $newRoleship -> role_id = 6;

            $newRoleship -> save();
            $msg = 'successful';
            echo $role;
        }
        else if($role == 'pending'){
            $msg = 'successfully resent';
            echo $role;
        }
        else{}
        return back()
            -> with('msg', $msg);
    }
}
