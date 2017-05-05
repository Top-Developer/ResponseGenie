<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use App\User;
use App\Club;
use App\Membership;

class ClubController extends Controller
{
    //

    //First screen after user logged in "MY Clubs"
    public function showMyClubs()
    {
        $user_id = Auth::id();
        $theClubs_ids = App\Membership::select('club_id') -> where( 'user_id', $user_id ) -> get();
        return view('club/myClub', [
            'page' => 'clubs'
        ]);
    }

    public function clubManagement()
    {

        return view('club/clubManagement', [
            'page' => 'clubs',
            'theClub' => null
        ]);
    }

    //First screen when user click "Clubs"
    public function showAllClubs()
    {
        $allClubs = DB::table('club')
            ->select('club.*')
            ->get();

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
        $club -> city = $request -> input( 'club_city' );
        $club -> state = $request -> input( 'club_state' );
        $club -> zipcode = $request -> input( 'club_zipcode' );
        $club -> membership_limit = $request -> input( 'club_memberlimit' );
        $club -> type = $request -> input( 'club_type' );

        $club -> save();

        $membership = new Membership;
        $membership -> user_id = Auth::id();
        $membership -> club_id = $club -> id;
        $membership -> role_id = 2;
        $membership -> save();

        return view('club/clubManagement', [
            'page' => 'clubs',
            'theClub' => $club,
            'theRole' => $membership -> role_id
        ]);

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

    //Receive post request from Club_Configuration_Page to update club information
    public function updateClubInformation(Request $request)
    {
        $data = $request->all();

        $path = Club::find(Session::get('club_id'))
            ->club_logo;
        //Confirm if logo is updated
        if(isset($request->clublogo))
        {
            $file = $request->clublogo;
            $path = $file->store('/uploads/images/club', 'uploads');
            if(!$path)
            {
                return redirect()->back()
                    ->with('status', 'danger')
                    ->with('message', 'File Upload failed, please choose another file.');
            }
        }


        try {
            Club::where('club_id', Session::get('club_id'))
                ->update([
                    'club_name' => $data['club_name'],
                    'club_description' => $data['club_description'],
                    'club_short_description' => $data['club_short_description'],
                    'club_slug' => $data['club_slug'],
                    'club_logo' => $path,
                    'club_website' => $data['club_website'],
                    'club_phone' => $data['club_phone'],
                    'club_address' => $data['club_address'],
                    'club_city' => $data['club_city'],
                    'club_state' => $data['club_state'],
                    'club_zip' => $data['club_zip'],
                    'membership_limit' => $data['membership_limit'],
                ]);
        }catch (\Exception $e)
        {
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Update Failed! '.$e->getMessage());
        }

        return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Club information updated successfully!');
    }

    public function showConfigClub($id)
    {
        $club = Club::find($id);

        //Check if user is admin of this club with club_id is $id
        $user_role = Membership::where([
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


}
