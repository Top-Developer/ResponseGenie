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
use App\Offline_member;
use App\Discount;

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
        $theClubOnlineMembers = DB::table('memberships')
            -> join('users', 'memberships.user_id', '=', 'users.id')
            -> select('users.*', 'memberships.join_date', 'memberships.expiration_date')
            -> get();

        $theRoleID = Roleship::where('user_id', Auth::id()) -> where('club_id', $club_id) -> firstOrFail() -> role_id;
        $theUserRole = Role::find($theRoleID) -> role_description;
        $theContact = $theClub -> contact;
        $pcm_id = $theContact -> pcm_id;
        $scm_id = $theContact -> scm_id;
        $thePCM = User::find($pcm_id);
        $thePCMRoleID = Roleship::where('user_id', $pcm_id) -> where('club_id', $club_id) -> firstOrFail() -> role_id;
        $thePCMRole = Role::find($thePCMRoleID) -> role_description;
        if($scm_id != '' && $scm_id != 'None'){
            $theSCM = User::find($scm_id);
            $theSCMRoleID = Roleship::where('user_id', $scm_id) -> where('club_id', $club_id) -> firstOrFail() -> role_id;
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
            'offlineMembers' => $offlineMembers,
            'onlineMembers' => $theClubOnlineMembers
        ]);
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
        $this -> validate($request, [
            'club_logo' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $logoName = time().'.'.$request -> club_logo -> getClientOriginalExtension();
        $request -> file('club_logo') -> move(public_path('uploads/images'), $logoName);
        $imagePath = asset('uploads/images/')."/".$logoName;
//        if( $request -> file('club_logo' ) -> isValid()){
//            $logo_path = $request -> file( 'club_logo' ) -> store( '/uploads/images/club');
//        }

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

        return back()
            ->with('success', 'Image Uploaded successfully.')
            ->with('path', $imagePath);

    }

    public function configureClub(Request $request){

        $club = Club::find(Session::get('theClubID'));
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
            $club -> contact -> zipcode = $request -> input( 'zip_code' );
        }else
            echo 'zcod wrong';

        $this -> validate($request, [
            'club_logo' => 'required|image|mimes:jpeg,png,jpg',]);

        $logoName = time().'.'.$request -> club_logo -> getClientOriginalExtension();
        $request -> file('club_logo') -> move(public_path('uploads/images'), $logoName);
        $imagePath = asset('uploads/images/')."/".$logoName;
        $club -> logo_path = $imagePath;
        $club -> contact -> save();
        $club -> save();

        return back()
//            -> withErrors('msg', 'The Message')
//            -> with('csvpath', $imagePath)
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
            echo 'name';
        if( $request -> pDesc != '' ){
            $mPlan -> description = $request -> pDesc;
        }else
            echo 'desc';
        if( $request -> pDura != '' ){
            $mPlan -> duration_quantity = $request -> pDura;
        }else
            echo 'dura';
        if( $request -> pDuraUnit != '' ){
            $mPlan -> duration_unit = $request -> pDuraUnit;;
        }else
            echo 'unit';
        if( $request -> pCost != '' ){
            $mPlan -> cost = $request -> pCost;
        }else
            echo 'cost';
        if( $request -> pMO != '' ){
            $plan_isMemberOnly = $request -> pMO;
            if( $plan_isMemberOnly == 'on' )
                $plan_isMemberOnly = 'true';
            else
                $plan_isMemberOnly = 'false';
            $mPlan -> is_for_members_only = $plan_isMemberOnly;
            $mPlan -> club_id = Session::get('theClubID');
            $mPlan -> save();
            echo 'success';
        }else
            echo 'pmo';
    }

    public function mPlanUpdate(Request $request)
    {

        if ($request->pId != '') {

            $mPlan = Membership_plan::find($request->pId);

            if ($request->pName != '') {
                $mPlan -> name = $request -> pName;
            } else
                die(header("HTTP/1.0 404 Not Found"));
            if ($request->pDesc != '') {
                $mPlan -> description = $request -> pDesc;
            } else
                die(header("HTTP/1.0 404 Not Found"));
            if ($request -> pDura != '') {
                $mPlan -> duration_quantity = $request -> pDura;
            } else
                die(header("HTTP/1.0 404 Not Found"));
            if ($request -> pDuraUnit != '') {
                $mPlan -> duration_unit = $request -> pDuraUnit;;
            } else
                die(header("HTTP/1.0 404 Not Found"));
            if ($request -> pCost != '') {
                $mPlan -> cost = $request -> pCost;
            } else
                die(header("HTTP/1.0 404 Not Found"));
            if ($request -> pMO == 'true')
                $mPlan -> is_for_members_only = 'true';
            else if ($request -> pMO == '')
                $mPlan -> is_for_members_only = 'false';
            else
                die(header("HTTP/1.0 404 Not Found"));
            $mPlan -> club_id = Session::get('theClubID');
            $mPlan -> save();
            echo 'success';

        } else
            die(header("HTTP/1.0 404 Not Found"));
    }

    public function import(Request $request){

        if( $request -> has('m_name_first') ){
            $fname = $request -> input('m_name_first');
            echo $fname[0];
        }
        else
            echo 'fname';
        if( $request -> has('m_name_last') ){
            $lname = $request -> input('m_name_last');
            echo $lname[0];
        }
        else
            echo 'lname';
        if( $request -> has('m_email') ){
            $eMail = $request -> input('m_email');
            echo $eMail[0];
        }
        else
            echo 'memail';
        if( $request -> has('m_join_date') ){
            $jDate = $request -> input('m_join_date');
            echo $jDate[0];
        }
        else
            echo 'jdate';
        if( $request -> has('m_exp_date') ){
            $eDate = $request -> input('m_exp_date');
            echo $eDate[0];
        }
        else
            echo 'edate';

            $this -> validate($request, [
                'csv_files' => 'required|mimes:csv,txt',]);

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
                    $oMember -> membership_plan_id = $data[6];
                    $oMember -> save();
                }
            }
            fclose($file);
            return back()
//                -> withErrors('msg', 'The Message')
//                -> with('csvpath', $csvName)
                ;

    }

    public function stripeInfo(Request $request){

        $club = Club::find(Session::get('theClubID'));
        $club -> stripe_pub_key = $request ->str_pub_key;
        $club -> stripe_pvt_key = $request ->str_pvt_key;
        $club -> save();

        return back();
    }

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
}
