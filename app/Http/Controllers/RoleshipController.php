<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Club;
use App\Member;
use App\MembershipPlan;
use App\Role;
use App\Roleship;
use App\User;

class RoleshipController extends Controller{

    public function createInvitation(Request $request){

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

    public function payForMembership(Request $request){

        if($request -> has('stripeToken')){
            \Stripe\Stripe::setApiKey(Session::get('stripe_secret_key'));

            $token = $request -> stripeToken;

            $charge = \Stripe\Charge::create(array(
                "amount" => 100 * MembershipPlan::find($request -> plan_id) -> cost,
                "currency" => "usd",
                "description" => "Example charge",
                "source" => $token,
            ));

            if($charge -> paid == true){

                $newRoleship = new Roleship;

                $newRoleship -> user_id = Auth::id();
                $newRoleship -> club_id = MembershipPlan::find($request -> plan_id) -> club_id;
                $newRoleship -> role_id = 4;

                $newRoleship -> save();

                $newMembership = new Member;
                $newMembership -> user_id = Auth::id();
                $newMembership -> membership_plan_id = $request -> plan_id;
                $newMembership -> join_date = date('Y-m-d');
                $duraUnit = MembershipPlan::find($request -> plan_id) -> duration_unit;
                if( $duraUnit == 'Day(s)' ){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.MembershipPlan::find($request -> plan_id) -> duration_quantity).' days');
                }
                else if($duraUnit == 'Month(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else if($duraUnit == 'Quater(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(3 * MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else{}

                $newMembership -> save();

                return redirect('/clubs/'.Club::find( MembershipPlan::find($request -> plan_id) -> club_id) -> slug);
            }
            else{
                echo 123;
                return back() -> with('msg', 'payment failed');
            }
        }
        else{
            if( 0 == MembershipPlan::find($request -> plan_id) -> cost ){
                $newRoleship = new Roleship;

                $newRoleship -> user_id = Auth::id();
                $newRoleship -> club_id = MembershipPlan::find($request -> plan_id) -> club_id;
                $newRoleship -> role_id = 4;

                $newRoleship -> save();

                $newMembership = new Member;
                $newMembership -> user_id = Auth::id();
                $newMembership -> membership_plan_id = $request -> plan_id;
                $newMembership -> join_date = date('Y-m-d');
                $duraUnit = MembershipPlan::find($request -> plan_id) -> duration_unit;
                if( $duraUnit == 'Day(s)' ){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(MembershipPlan::find($request -> plan_id) -> duration_quantity).' days'));
                }
                else if($duraUnit == 'Month(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else if($duraUnit == 'Quater(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(3 * MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else{}

                $newMembership -> save();

                return $this -> clubManagement(Club::find( MembershipPlan::find($request -> plan_id) -> club_id) -> slug);
            }
        }
    }

    public function dealRequest(){

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
            $newRoleship -> role_id = 5;

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
