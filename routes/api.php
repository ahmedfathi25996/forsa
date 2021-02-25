<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    #region VOIP
    Route::get('session/{session_id}/join','Api\DoctorController@joinSession');
    Route::get("update/session/status",'Api\DoctorController@updateSessionStatus');
    Route::get('update/after/session/{session_id}/actions','Api\DoctorController@afterSessionActions');
    #endregion


Route::group([ 'middleware' => ['auth:api','APILocalization']], function () {

    Route::post('update/token', 'Api\AuthController@updatePushToken');
    Route::post('logout', 'Api\AuthController@logout');


   #region my sessions
    Route::get("mysessions/upcomming",'Api\UserController@upcommingSessions');
    Route::get("mysessions/previous",'Api\UserController@previousSessions');

    #endregion

    #region user booking
    Route::post('/book/session', 'Api\UserController@bookSession');
    Route::get("/booking/{booking_id}",'Api\UserController@getBooking');
    Route::post("apply/promo/code/{booking_id}",'Api\UserController@apply_promo');
    #endregion

    #region doctor sessions
    Route::post("/add/session",'Api\DoctorController@addNewSession');
    Route::put("/edit/session/{session_id}",'Api\DoctorController@editSession');

    #endregion
    Route::post("/rate/doctor/{doctor_id}/session/{session_id}",'Api\UserController@rateDoctor');

    #region user profile

    Route::get('profile', 'Api\UserController@getProfile');
    Route::post('profile/image', 'Api\UserController@updateProfileImage');
    Route::post('profile/name', 'Api\UserController@updateProfileName');
    Route::put('change/password', 'Api\UserController@changePassword');
    Route::put('user/update/profile','Api\UserController@updateProfile');
    #endregion


    #region doctor profile
    Route::put("doctor/update/profile",'Api\DoctorController@updateProfile');
    Route::get("doctor/bio",'Api\DoctorController@getDoctorBio');
    Route::post("doctor/update/bio",'Api\DoctorController@updateDoctorBio');
    Route::get("doctor/ratings/{session_id}",'Api\DoctorController@getDoctorRatings');
    Route::get("doctors/rate",'Api\DoctorController@getAllRatings');
    Route::get("doctor/home/booked/schedule",'Api\DoctorController@getBookedDoctorSessionsHome');
    Route::get("booking/cancel/{session_id}",'Api\UserController@cancelBooking');
    Route::get("doctor/wallet",'Api\DoctorController@getDoctorWallet');

    #endregion

    Route::get("notifications",'Api\UserController@getNofifications');
    Route::get("list/schedule",'Api\DoctorController@listSchedule');
    Route::get("start/session/{session_id}",'Api\DoctorController@startSession');



    //user notifications
    Route::get('user/notifications','Api\UserController@userNotifications');

    #endregion



});



Route::group([ 'middleware' => ['APILocalization']], function () {

    Route::post('login', 'Api\AuthController@login');
    Route::post('verification', 'Api\AuthController@numberVerification');
    Route::post('social/login','Api\AuthController@socialLogin');

    Route::get('/login/{social}','Api\AuthController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
    Route::get('/login/{social}/callback','Api\AuthController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

});


Route::group([ 'middleware' => ['APILocalization','shouldUseApi']], function () {

    #region authentication
    Route::post('register', 'Api\AuthController@register');
    Route::post('send/verification/code', 'Api\AuthController@sendVerificationCode');
    Route::post('forget/password', 'Api\AuthController@passwordForget');
    Route::post('reset/password', 'Api\AuthController@resetPassword');
    Route::post('check/verification/code', 'Api\AuthController@checkVerificationCode');
    Route::post('reset/password/byEmail', 'Api\AuthController@resetPasswordByEmail');
    #endregion


    #region pages

    Route::get('/pages', 'Api\SettingController@getPages');
    Route::get('/pages/{title}', 'Api\SettingController@getPage');

    #endregion

    #region setting
    Route::get('social', 'Api\SettingController@getSocial');
    Route::get('languages', 'Api\SettingController@getLanguages');

    #endregion

    #region user support messages

    Route::post('support', 'Api\UserController@sendSupport');

    #endregion


    #region categories

    Route::get('categories', 'Api\SettingController@getCategories');
    #endregion

    #region doctors
    Route::get("doctors",'Api\DoctorController@listAllDoctors');
    Route::get('doctors/{doctor_id}','Api\DoctorController@getSingleDoctor');

    #endregion


    #region show social

    Route::get('show/social/auth','Api\AuthController@showSocialAuth');

    #endregion

    Route::get('/activation/{user_id}','Api\AuthController@activation');

});
