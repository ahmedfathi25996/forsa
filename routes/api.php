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

    #region profile

    Route::get('profile', 'Api\UserController@getProfile');
    Route::post('profile/image', 'Api\UserController@updateProfileImage');
    Route::post('profile/name', 'Api\UserController@updateProfileName');
    Route::put('change/password', 'Api\UserController@changePassword');
    Route::put('user/update/profile','Api\UserController@updateProfile');

    #region doctor profile
    Route::put("doctor/update/profile",'Api\DoctorController@updateProfile');
    Route::get("doctor/bio",'Api\DoctorController@getDoctorBio');
    Route::post("doctor/update/bio",'Api\DoctorController@updateDoctorBio');
    Route::get("doctor/ratings/{session_id}",'Api\DoctorController@getDoctorRatings');
    Route::get("doctors/rate",'Api\DoctorController@getAllRatings');
    #endregion

    #endregion

    Route::get("notifications",'Api\UserController@getNofifications');
    Route::get("list/schedule",'Api\DoctorController@listSchedule');

    // update mobile phone
    Route::post('change/mobile', 'Api\UserController@changeMobile');
    Route::put('change/mobile', 'Api\UserController@checkTempVerificationCode');

    // update email
    Route::post('change/email', 'Api\UserController@changeEmail');
    Route::put('change/email', 'Api\UserController@checkEmailTempVerificationCode');

    //redeem money
    Route::get('redeem/rules','Api\UserController@getRedeemRules');
    Route::post('redeem/money','Api\UserController@redeemMoney');
    Route::get('user/wallet','Api\UserController@getUserWallet');

    //user orders
    Route::get('user/orders','Api\UserController@userOrders');

    //user notifications
    Route::get('user/notifications','Api\UserController@userNotifications');


    #region video call
    Route::get("sessions/{session_id}",'Api\UserController@session');
    Route::get('video/{channel_name}/{appid}/{token}','Api\UserController@join_video');
    #endregion

    #endregion

    #region offers
    Route::post('offer/{offer_id}/order','Api\OfferController@useOffer');
    #endregion


    #region plans
    Route::get('plans','Api\SettingController@getPlans');
    Route::get('plans/{plan_id}','Api\SettingController@getPlan');
    #endregion
});



Route::group([ 'middleware' => ['APILocalization']], function () {

    Route::post('login', 'Api\AuthController@login');
    Route::post('verification', 'Api\AuthController@numberVerification');
    Route::post('social/login','Api\AuthController@socialLogin');

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



    #region brands
    //home
    Route::get('brands','Api\BrandController@getBrands');


    Route::get('list/brands','Api\BrandController@listAllBrands');
    Route::get('brands/featured','Api\BrandController@getFeatureBrands');
    Route::get('brands/{brand_id}','Api\BrandController@getBrand');
    Route::get('categories/{cat_id}/brands','Api\BrandController@getCategoryBrands');
    #endregion


    #region offers
    //home
    Route::get('offers','Api\OfferController@getOffers');


    Route::get('list/offers','Api\OfferController@listAllOffers');
    Route::get('hot/offers','Api\OfferController@getHotOffers');
    Route::get('offers/{offer_id}','Api\OfferController@getSingleOffer');
    Route::get('nearby/offers','Api\OfferController@getNearByOffers');
    Route::post('search/offers','Api\OfferController@searchOffers');

    #endregion


    #region custom home screen

    Route::get('home','Api\HomeController@getHome');

    #endregion


    #region check show social

    Route::get('show/social/auth','Api\AuthController@showSocialAuth');

    #endregion

    #region cities and districts
    Route::get('list/cities', 'Api\SettingController@cityDistrict');

    #endregion

    Route::get('/activation/{user_id}','Api\AuthController@activation');

});
