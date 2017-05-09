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
        $role_id = Roleship::where('user_id', Auth::id()) -> where('club_id', $club_id) -> firstOrFail() -> role_id;
        $theRole = Role::find($role_id) -> role_description;
        $theContact = $theClub -> contact;
        $pcm_id = $theContact -> pcm_id;
        $scm_id = $theContact -> scm_id;
        $thePCM = User::find($pcm_id);
        $theSCM = User::find($scm_id);
        $thePCMRoleID = Roleship::where('user_id', $pcm_id) -> where('club_id', $club_id) ->firstOrFail() -> role_id;
        $thePCMRole = Role::find($thePCMRoleID) -> role_description;
        $theSCMRoleID = Roleship::where('user_id', $scm_id) -> where('club_id', $club_id) ->firstOrFail() -> role_id;
        $theSCMRole = Role::find($theSCMRoleID) -> role_description;


        return view('club/clubManagement', [
            'page' => 'clubs',
            'theClub' => $theClub,
            'theClubUsers' => $theClub -> users,
            'theContact' => $theContact,
            'theRole' => $theRole,
            'thePCM' => $thePCM,
            'thePCMRole' => $thePCMRole,
            'theSCM' => $theSCM,
            'theSCMRole' => $theSCMRole
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
            'theRole' => $roleship -> role_id,
            'theContact' => $contact
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
        $newCity = $request -> city;
        $newState = $request -> state;
        $newZcod = $request -> zipcode;
        $newPcmID = $request -> pcmid;
        $newScmID = $request -> scmid;
        $newLinkedIn = $request -> inLink;
        $newLevelIn = $request -> inLevel;
        $newTwitter = $request -> ttLink;
        $newLevelT = $request -> ttLevel;
        $newFacebook = $request -> fbLink;
        $newLevelF = $request -> fbLevel;
        $newYoutube = $request -> ytLink;
        $newLevelY = $request -> ytLevel;
        $newGoogle = $request -> goLink;
        $newLevelG = $request -> goLevel;
        $newMail = $request -> maLink;
        $newLevelM = $request -> maLevel;

        DB::table('contacts')
            -> where( 'club_id', session('theClubID'))
            ->update([
                'city' => $newCity,
                'state' => $newState,
                'zipcode' => $newZcod,
                'pcm_id' => $newPcmID,
                'scm_id' => $newScmID,
                'linkedin' => $newLinkedIn,
                'level_in' => $newLevelIn,
                'twitter' => $newTwitter,
                'level_t' => $newLevelT,
                'facebook' => $newFacebook,
                'level_f' => $newLevelF,
                'youtube' => $newYoutube,
                'level_y' => $newLevelY,
                'googleplus' => $newGoogle,
                'level_g' => $newLevelG,
                'mail' => $newMail,
                'level_m' => $newLevelM
            ]);

        clubManagement( session('theClubID') );
    }


}
