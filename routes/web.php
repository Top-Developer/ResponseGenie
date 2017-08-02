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

Route::get('/createClub', function() {
    return view('club/createClub')->with('page', 'createClub');
});

Route::get('/event/create/{slug}', function(){
    return view('event/createEvent')->with('page', 'createEvent');
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


//----------------  Main Nav bar ----------------//


Route::get('/myaccount', function () {
   return view('account/myaccount')->with('page', 'myaccount');
});

Route::get('/configevent', function () {
   return view('event/configevent')->with('page', 'events');
});


// ---------------- Social Authentication ---------------- //


Route::get('/social/{provider}', 'AccountController@redirectToProvider');
Route::get('/social/{provider}/callback', 'AccountController@handleProviderCallback');

Route::get('/test', function() {
    return view('test');
});


// ---------------- Club ---------------- //


Route::post('/club/create', 'ClubController@createClub');

Route::get('/club/all-clubs', 'ClubController@readAllClubs');
Route::get('/club/my-clubs', 'ClubController@readMyClubs');
Route::get('/clubs/{slug}', 'ClubController@readClub');

Route::post('/club/configure', 'ClubController@updateClub');
Route::post('/club/update/message-of-club' , 'ClubController@updateClubMessage');
Route::post('/club/update/information-of-club', 'ClubController@updateClubInformation');


// ---------------- Discount ---------------- //


Route::post('/discount/create', 'DiscountController@createDiscount');


// ---------------- Membership Plan ---------------- //


Route::post('/membership-plan/update', 'MembershipPlanController@updateMembershipPlan');
Route::post('/membership-plan/create', 'MembershipPlanController@createMembershipPlan');


// ---------------- Member ---------------- //


Route::post('/offline-member/import', 'MemberController@importOfflineMembers');


// ---------------- Contact ---------------- //


Route::post('/contact/club/edit', 'ContactController@editClubContact');
Route::post('/contact/event/edit', 'ContactController@editEventContact');


// ---------------- Event ---------------- //


Route::post('/event/create', 'EventController@createEvent');

Route::get('/event/getEventDates', 'EventController@readEventDates');
Route::get('/event/all-events', 'EventController@readAllEvents');
Route::get('/event/my-events', 'EventController@readMyEvents');

Route::post('/event/configure', 'EventController@updateEvent');

Route::post('/event/invite-a-member', 'EventController@inviteAMember');

Route::get('/events/{slug}', 'EventController@readEvent');
Route::get('/events/{slug}/become-a-member', 'EventController@becomeAnEventMember');


// ---------------- Price of Event ---------------- //


Route::post('/price-of-event/create', 'PriceController@createPrice');
Route::post('/price-of-event/update', 'PriceController@updatePrice');


// ---------------- Roleship ---------------- //


Route::post('/club/{slug}/invite-a-member', 'RoleshipController@createInvitation');
Route::post('/club/request', 'RoleshipController@dealRequest');
Route::post('/club/payForMembership', 'RoleshipController@payForMembership');
Route::get('/club/{slug}/become-a-member', 'ClubController@becomeAMember')->middleware('auth');


// ---------------- Transaction ---------------- //


Route::post('/transaction/insert-manually', 'TransactionController@insertManualTransactions');