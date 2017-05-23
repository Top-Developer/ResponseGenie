<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Membership_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use App\User;
use App\Club;
use App\Roleship;
use App\Role;
use App\Contact;

class ClubController extends Controller
{
    //

    //First screen after user logged in "MY Clubs"
    public function showMyClubs()
    {
        $user = User::find(Auth::id());
        $theClubs = $user -> clubs;
        return view('club/myClub', [
            'page' => 'clubs',
            'myClubs' => $theClubs
        ]);
    }

    public function clubManagement($club_id)
    {
        session(['theClubID' => $club_id]);
        $theClub = Club::find($club_id);
        $theRoleID = Roleship::where('user_id', Auth::id()) -> where('club_id', $club_id) -> firstOrFail() -> role_id;
        $theUserRole = Role::find($theRoleID) -> role_description;
        $theContact = $theClub -> contact;
        $pcm_id = $theContact -> pcm_id;
        $scm_id = $theContact -> scm_id;
        $thePCM = User::find($pcm_id);
        $thePCMRoleID = Roleship::where('user_id', $pcm_id) -> where('club_id', $club_id) ->firstOrFail() -> role_id;
        $thePCMRole = Role::find($thePCMRoleID) -> role_description;
        if($scm_id != ''){
            $theSCM = User::find($scm_id);
            $theSCMRoleID = Roleship::where('user_id', $scm_id) -> where('club_id', $club_id) ->firstOrFail() -> role_id;
            $theSCMRole = Role::find($theSCMRoleID) -> role_description;
        }else{
            $theSCM = NULL;
            $theSCMRole = NULL;
        }

        return view('club/clubManagement', [
            'page' => 'clubs',
            'theClub' => $theClub,
            'theClubUsers' => $theClub -> users,
            'theContact' => $theContact,
            'theUserRole' => $theUserRole,
            'thePCM' => $thePCM,
            'thePCMRole' => $thePCMRole,
            'theSCM' => $theSCM,
            'theSCMRole' => $theSCMRole
        ]);
//        return view('club/clubManagement', [
//            'page' => 'clubs',
//            'theClub' => $theClub,
//            'theClubUsers' => $theClub -> users,
//            'theContact' => $theContact,
//            'theUserRole' => $theUserRole,
//            'thePCM' => $thePCM,
//            'thePCMRole' => $thePCMRole,
//            'theSCM' => $theSCM,
//            'theSCMRole' => $theSCMRole
//        ]);
    }

    //First screen when user click "Clubs"
    public function showAllClubs()
    {
        $allClubs = Club::all();

        return view('club/allClubs', ['page' => 'allClubs', 'allClubs' => $allClubs]);
    }

    //Receive post request and create new club with requested data
    public function createClub(Request $request)
    {
        if( $request -> file('club_logo' ) -> isValid()){
            $logo_path = $request -> file( 'club_logo' ) -> store( '/uploads/images/club');
        }

        $club = new Club;
        $club -> name = $request -> input( 'club_name' );
        $club -> slug = $request -> input( 'club_slug' );
        $club -> description = $request -> input( 'club_description' );
        $club -> short_description = $request -> input( 'club_short_description' );
        $club -> website = $request -> input( 'club_url' );
        $club -> logo_path = $logo_path;
        $club -> phone_number = $request -> input( 'club_phone' );
        $club -> membership_limit = $request -> input( 'club_memberlimit' );
        $club -> type = $request -> input( 'club_type' );
        $club -> save();

        $contact = new Contact;
        $contact -> zipcode = $request -> input( 'club_zipcode' );
        $contact -> city = $request -> input( 'club_city' );
        $contact -> state = $request -> input( 'club_state' );
        $contact -> club_id = $club -> id;
        $contact -> save();

        $roleship = new Roleship;
        $roleship -> user_id = Auth::id();
        $roleship -> club_id = $club -> id;
        $roleship -> role_id = 2;
        $roleship -> save();

        return view('club/clubManagement', [
            'page' => 'clubs',
            'theClub' => $club,
            'theClubUsers' => $club -> users,
            'theContact' => $contact,
            'theUserRole' => 'admin',
            'thePCM' => '',
            'thePCMRole' => '',
            'theSCM' => '',
            'theSCMRole' => ''
        ]);

    }

    public function configureClub(Request $request){

        $club = Club::find(Session::get('theClubID'));
        if( $request -> input( 'club_name' ) != '' ){
            $club -> name = $request -> input( 'club_name' );
        }
        if( $request -> input( 'club_slug' ) != '' ){
            $club -> slug = $request -> input( 'club_slug' );
        }
        if( $request -> input( 'club_desc_pub' ) != '' ){
            $club -> description = $request -> input( 'club_desc_pub' );
        }
        if( $request -> input( 'club_desc_prv' ) != '' ){
            $club -> short_description = $request -> input( 'club_desc_prv' );
        }
        if( $request -> file('club_logo' ) ){
            $logo_path = $request -> file( 'club_logo' ) -> store( '/uploads/images/club');
            $club -> logo_path = $logo_path;
        }
        if( $request -> input( 'club_type' ) != '' ){
            $club -> type = $request -> input( 'club_type' );
        }
        if( $request -> input( 'zip_code' ) ){
            $club -> contact -> zipcode = $request -> input( 'zip_code' );
        }
        $club -> contact -> save();
        $club -> save();
        echo $club;
        echo $club -> contact -> zipcode;
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
                die(header("HTTP/1.0 404 Not Found"));
            }
            else{
                $roleship = new Roleship;
                $roleship -> user_id = $user -> id ;
                $roleship -> club_id = session('theClubID');
                $roleship -> role_id = 5;
                $roleship -> save();
                echo 'success';
            }
        }
        else{
            die(header("HTTP/1.0 404 Not Found"));
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
        $contact = Contact::find(Club::find(session('theClubID')) -> contact -> id);

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

        echo 'success';

    }

    public function membershipPlanAdd(Request $request){

        $mPlan = new Membership_plan;

        if( $request -> pName != '' ){
            $mPlan -> name = $request -> pName;
        }else
            die(header("HTTP/1.0 404 Not Found"));
        if( $request -> pDesc != '' ){
            $mPlan -> description = $request -> pDesc;
        }else
            die(header("HTTP/1.0 404 Not Found"));
        if( $request -> pDura != '' ){
            $mPlan -> duration = $request -> pDura.$request -> pDuraUnit;;
        }else
            die(header("HTTP/1.0 404 Not Found"));
        if( $request -> pCost != '' ){
            $mPlan -> cost = $request -> pCost;
        }else
            die(header("HTTP/1.0 404 Not Found"));
        if( $request -> pMO != '' ){
            $plan_isMemberOnly = $request -> pMO;
            if( $plan_isMemberOnly == 'on' )
                $plan_isMemberOnly = 'true';
            else
                $plan_isMemberOnly = 'false';
            $mPlan -> is_for_members_only = $plan_isMemberOnly;
        }else
            die(header("HTTP/1.0 404 Not Found"));
        if( $request -> pName != '' ){
            $mPlan -> name = $request -> pName;
        }else
            die(header("HTTP/1.0 404 Not Found"));
        if( $request -> pName != '' ){
            $mPlan -> name = $request -> pName;
            $mPlan -> club_id = Session::get('theClubID');
            $mPlan -> save();
            echo 'success';
        }else
            die(header("HTTP/1.0 404 Not Found"));
    }

    public function import(Request $request){

    }
}
