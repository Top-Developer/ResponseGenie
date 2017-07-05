<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/home', function() {
    return Redirect::to('/')->with('page', 'home');
});

Route::get('/', function() { return view('home')->with('page', 'home'); });
Auth::routes();
Route::get('/validate-email', function () { return view('auth/validate_email'); });
Route::get('/validate/{id}/{emailValidation}', 'AccountController@validateemail');

Route::group(['middleware' => ['app']], function () {
    Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
    Route::get('/account/settings', 'AccountController@settings')->middleware('auth');
    Route::post('/account/settings', 'AccountController@update')->middleware('auth');
    Route::post('/account/changepassword', 'AccountController@changepassword')->middleware('auth');
    Route::get('/{slug}/become-a-member', 'ClubController@becomeAMember')->middleware('auth');
});

//User images
Route::get('/userimages/{filename}', function ($filename)
{
    $path = storage_path() . '/app/user_images/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

//User Clubs - temporary

//<-----------------  Main Nav bar ----------------->


Route::get('/myaccount', function () {
   return view('account/myaccount')->with('page', 'myaccount');
});

Route::get('/configevent', function () {
   return view('event/configevent')->with('page', 'events');
});


//###################### Social Authentication #############################//
Route::get('/social/{provider}', 'AccountController@redirectToProvider');
Route::get('/social/{provider}/callback', 'AccountController@handleProviderCallback');

//----------------- Club Controller -----------------//
Route::post('/club/create', 'ClubController@createClub');
Route::post('/club/configure', 'ClubController@configureClub');
Route::post('/club/updateClubMessage' , 'ClubController@updateClubMessage');
Route::post('/club/updateClubInformation', 'ClubController@updateClubInformation');
Route::get('/club/allClubs', 'ClubController@showAllClubs');
Route::get('/club/myClubs', 'ClubController@showMyClubs');
Route::get('/createClub', function() {
    return view('club/createClub')->with('page', 'createClub');
});

Route::get('configclub/{id}', [
    "uses" => 'ClubController@showConfigClub',
    "as" => 'configclub'
]);

Route::get('/clubs/{slug}', 'ClubController@clubManagement');

Route::get('/test', function() {
    return view('test');
});

Route::post('/edit/contact', 'ClubController@contactUpdate');
Route::post('/edit/membership_plan', 'ClubController@mPlanUpdate');
Route::post('/add/membership_plan', 'ClubController@membershipPlanAdd');
Route::post('/add/discount', 'ClubController@addDiscount');
Route::post('/invite', 'ClubController@inviteNew');
Route::post('/import', 'ClubController@import');
Route::post('/club/stripe', 'ClubController@stripeInfo');
Route::post('/enter/manual_transaction', 'ClubController@enterManual');
Route::post('/club/payForMembership', 'ClubController@payForMembership');
Route::post('/club/request', 'ClubController@dealRequest');

//------------------------------- Event ---------------------------------//

Route::post('/event/add/price', 'EventController@addPrice');
Route::get('/event/allEvents', 'EventController@showAllEvents');
Route::post('/event/create', 'EventController@createEvent');
Route::post('/event/configure', 'EventController@configureEvent');
Route::post('/event/contact/edit', 'EventController@editContact');
Route::get('/event/getEventDates', 'EventController@getEventDates');
Route::get('/event/myEvents', 'EventController@showMyEvents');
Route::post('/event/price/edit', 'EventController@editPrice');

Route::get('/events/{slug}', 'EventController@eventManagement');
Route::get('/events/{slug}/create-an-event', 'EventController@eventCreate');

//-----------------------------------------------------------------------//
