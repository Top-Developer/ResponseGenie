<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use Socialite;
use Illuminate\Support\Facades\Input;

class AccountController extends Controller
{


    protected $redirectTo = '/';

    public function __construct()
    {

    }

    public function settings(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return view('account/settings')->with('user', $user)->with('pageTitle', 'Account Settings');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'zip' => 'required|max:255'
            ]
        );

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->zip = $request->input('zip');

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid())
        {
            //Create filename based on id and extension
            $profile = 'user_'.Auth::user()->id.'.'.$request->file('profile_image')->extension();

            //Save file in storage/app/question media
            $request->file('profile_image')->storeAs('user_images', $profile);

            //Update entry
            $user->profile_image = $profile;
        }

        $user->save();

        $request->session()->flash('toast-type', 'success');
        $request->session()->flash('toast-title', 'Account Updated');
        $request->session()->flash('toast-message', 'You have successfully updated your account!');

        return redirect('/account/settings');
    }

    public function changepassword(Request $request)
    {
        $this->request = $request;
        $this->user = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:255',
            'new_password' => 'required|max:255',
            'confirm_password' => 'required|max:255'
        ]);

        $validator->after(function ($validator) {

            //check password is correct

            if(!Hash::check($this->request->input('old_password'), $this->user->password))
            {
                $validator->errors()->add('old_password', 'Incorrect password!');
            }

            //check password is confirmed
            if($this->request->input('new_password') != $this->request->input('confirm_password'))
            {
                $validator->errors()->add('confirm_password', 'Passwords do not match!');
            }
        });


        if ($validator->fails()) {
            return redirect('/account/settings')
                ->withErrors($validator)
                ->withInput();
        }

        //Everything is good, change the password
        $this->user->password = Hash::make($this->request->input('new_password'));
        $this->user->save();

        $request->session()->flash('toast-type', 'success');
        $request->session()->flash('toast-title', 'Password Changed');
        $request->session()->flash('toast-message', 'You have successfully changed your password!');

        return redirect('/account/settings');
    }

    public function validateemail($id, $emailValidation)
    {

        $user = User::find($id);


        if ($user->email_validation == $emailValidation) {
            $user->email_validation = NULL;
            $user->save();
            return redirect('/home');
        } else {
            return redirect('/validate-email');
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {

        //catch callback errors such as user_cancelled_login or denied error

        //linkedin error when user cancel login with linkedin
        if (isset($_GET['error']) && $_GET['error'] == 'user_cancelled_login') {

            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our Rosterfi.');

        }

        //twitter error when user cancel login with twitter
        if (isset($_GET['error']) && $_GET['error'] == 'access_denied') {

            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'Access denied, to share your profile data with our Rosterfi.');

        }

        //facebook error when user cancel login with facebook
        if (isset($_GET['denied'])) {

            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our Rosterfi.');

        }

        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        Session::put('userid', $authUser->id);
        Session::put('username', $authUser->name);
        Session::put('useremail', $authUser->email);


        return redirect('/home');
    }

    public function findOrCreateUser($user, $provider)
    {


        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();

        if(!empty($userCheck))
        {
            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'Your email was already used, previous log in using'.$userCheck->provider.'. Please log in using Facebook.');
        }

        return User::create([
            'first_name' => $user->name,
            'last_name' => "",
            'email'    => $user->email,
            'address' => "",
            'city' => "",
            'state' => "",
            'phone' => "",
            'zip' => "",
            'provider' => $provider,
            'provider_id' => $user->id,
            'is_admin' => false,
            'password' => "",
        ]);

    }
}
