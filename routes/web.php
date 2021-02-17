<?php

    Route::get('/','front\Auth\loginController@index')->name("login");


    #region static pages

    Route::get('/join','front\HomeController@join');
    Route::get('/contact-us','front\HomeController@contactUs');
    Route::post('/contact-us','front\HomeController@contactUs');
    Route::get('/faQs','front\HomeController@faQs');
    Route::get('/privacy','front\HomeController@privacy');

    #endregion

    #region video call
    Route::get("session",'front\HomeController@session');
    Route::get('video/{channel_name}/{appid}/{token}','front\HomeController@join_video');
    #endregion


    #region Auth

    Route::get('/login','front\Auth\loginController@index')->name("login");
    Route::post('/login','front\Auth\loginController@login');

    Route::get('/logout','front\Auth\logoutController@index')->name("logout");

    #endregion


    #region dynamic image format

    Route::get('/uploads/{folder}/{target_image?}','Controller@getFormattedImage');
    Route::get('/uploads/{folder1}/{folder2}/{target_image?}','Controller@getFormattedImage');
    Route::get('/uploads/{folder1}/{folder2}/{folder3}/{target_image?}','Controller@getFormattedImage');
    Route::get('/uploads/{folder1}/{folder2}/{folder3}/{folder4}/{target_image?}','Controller@getFormattedImage');

    Route::get('/public/{folder}/{target_image?}','Controller@getFormattedImage');

    #endregion



    Route::get('/change/password','front\Auth\loginController@change_password');
    Route::post('/change_password','front\Auth\loginController@save_change_password');


    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ForgotPasswordController@reset');


    //Auth::routes();
    //Route::get('/home', 'admin\dashboard@index')->name('home');
