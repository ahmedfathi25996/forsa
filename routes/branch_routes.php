<?php


    Route::get('dashboard','branch\dashboardController@index');

    #region users

    Route::get('users/profile/{user_id}','branch\users\usersController@getUser')->where("user_id","([0-9]*)*");

    #endregion


    #region admins

    Route::get('admins/edit/{user_id}', 'branch\adminController@edit')->where("user_id","([0-9]*)*");
    Route::post('admins/edit/{user_id}', 'branch\adminController@edit')->where("user_id","([0-9]*)*");

    #endregion


    #region branches

    Route::get('branches','branch\BranchesController@index');

    Route::get('branches/save/{branch_id?}','branch\BranchesController@save')->where("branch_id","([0-9]*)*");
    Route::post('branches/save/{branch_id?}','branch\BranchesController@save')->where("branch_id","([0-9]*)*");
    Route::post('branches/delete','branch\BranchesController@delete');

    #endregion


    #region branches working days

    Route::get('working_days','branch\branchesWorkingDaysController@index');
    Route::get('working_days/save/{id?}','branch\branchesWorkingDaysController@save')->where("id","([0-9]*)*");
    Route::post('working_days/save/{id?}','branch\branchesWorkingDaysController@save')->where("id","([0-9]*)*");
    Route::post('working_days/delete','branch\branchesWorkingDaysController@delete');

    #endregion


    #region offers

    Route::get('offers','branch\offersController@index');
    Route::get('offers/save/{offer_id?}','branch\offersController@save')->where("offer_id","([0-9]*)*");
    Route::post('offers/save/{offer_id?}','branch\offersController@save')->where("offer_id","([0-9]*)*");
    Route::post('offers/delete','branch\offersController@delete');

    #endregion


    #region orders

    Route::get('orders','branch\ordersController@index');
    Route::get('orders/save/{order_id?}','branch\ordersController@save')->where("order_id","([0-9]*)*");
    Route::post('orders/save/{order_id?}','branch\ordersController@save')->where("order_id","([0-9]*)*");

    #endregion


    #region QR code
    Route::get('qrcode','branch\QRController@index');
    #endregion

