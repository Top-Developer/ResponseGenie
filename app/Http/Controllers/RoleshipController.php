<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Club;
use App\EventMember;
use App\Role;
use App\Roleship;
use App\User;

class RoleshipController extends Controller{

    public function createInvitationForClub(Request $request){

        $isExist = User::where('first_name', $request -> input( 'first_name' ))
            -> where('last_name', $request -> input( 'last_name' ))
            -> where('email', $request -> input( 'email' ))
            -> count();

        if( $isExist > 0 ){

            $user = User::where('first_name', $request -> input( 'first_name' ))
                -> where('last_name', $request -> input( 'last_name' ))
                -> where('email', $request -> input( 'email' ))
                -> firstOrFail();

            if($user->id == Auth::id())
            {
                return back()
                    -> with('active_tab',  $request -> active_tab)
                    -> with('members_msg', 'can not invite yourself');
            }
            else{
                $roleship = new Roleship;
                $roleship -> user_id = $user -> id ;
                $roleship -> club_id = session('theClubID');
                $roleship -> role_id = 4;
                $roleship -> save();
                return back()
                    -> with('active_tab',  $request -> active_tab)
                    -> with('members_msg', 'Invitation sent successfully.');
            }
        }
        else{
            return back()
                -> with('active_tab',  $request -> active_tab)
                -> with('members_msg', 'the user does not exist');
        }
    }

    public function createInvitationForEvent(Request $request){

        $isExist = User::where('first_name', $request -> input( 'first_name' ))
            -> where('last_name', $request -> input( 'last_name' ))
            -> where('email', $request -> input( 'email' ))
            -> count();

        if( $isExist > 0 ){

            $user = User::where('first_name', $request -> input( 'first_name' ))
                -> where('last_name', $request -> input( 'last_name' ))
                -> where('email', $request -> input( 'email' ))
                -> firstOrFail();

            if($user->id == Auth::id())
            {
                return back()
                    -> with('active_tab',  $request -> active_tab)
                    -> with('members_msg', 'can not invite yourself');
            }
            else{
                $member = new EventMember;
                $member->user_id = $user->id;
                $member->event_id = session('theClubID');
                $member->invited = 1;
                $member->save();
                return back()
                    -> with('active_tab',  $request -> active_tab)
                    -> with('members_msg', 'Invitation sent successfully.');
            }
        }
        else{
            return back()
                -> with('active_tab',  $request -> active_tab)
                -> with('members_msg', 'the user does not exist');
        }

    }

    public function becomeAMember($slug){

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
            'clubType' => $theClub->type,
            'clubName' => $theClub->name,
            'clubSlug' => $theClub->slug,
            'membershipPlans' => $theClub->membership_plans,
            'count' => $count,
            'stripe_public_key' => $theClub->stripe_pub_key,
            'role' => $role
        ]) -> with('msg', '');
    }

    public function dealRequest($slug){

        $club_id = Club::where('slug', $slug)
            ->first()
            ->id;
        $roleship = Roleship::where('user_id', Auth::id())
            ->where('club_id', $club_id)
            ->first();
        $role = 'none';
        $msg = 'snap';
        echo $role;
        if( $roleship ){
            $role = Role::find( $roleship->role_id )->role_description;
        }
        if($role == 'none'){
            $newRoleship = new Roleship;
            $newRoleship -> user_id = Auth::id();
            $newRoleship -> club_id = $club_id;
            $newRoleship -> role_id = 5;
            $newRoleship -> save();
            $msg = 'Your request is successfully sent.';
        }
        else if($role == 'pending'){
            $msg = 'Resending the request is successfully done.';
        }
        else{}
        return back()
            -> with('message', $msg);
    }
}
