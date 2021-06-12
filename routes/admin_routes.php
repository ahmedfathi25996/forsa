<?php


    Route::get('dashboard','admin\dashboardController@index');


    #region langs

    Route::get('langs','admin\langsController@index');

    Route::get('langs/save/{lang_id?}','admin\langsController@save')->where('lang_id','([0-9]*)*');
    Route::post('langs/save/{lang_id?}','admin\langsController@save')->where('lang_id','([0-9]*)*');

    Route::post('langs/delete','admin\langsController@delete');

    #endregion


    #region static pages

    Route::get('pages','admin\pagesController@index');

    Route::get('pages/save/{page_id?}','admin\pagesController@save')->where('page_id','([0-9]*)*');
    Route::post('pages/save/{page_id?}','admin\pagesController@save')->where('page_id','([0-9]*)*');

    Route::post('pages/delete','admin\pagesController@delete');

    #endregion



    #region social pages

    Route::get('social','admin\socialController@index');

    Route::get('social/save/{social_list_id?}','admin\socialController@save')->where('social_list_id','([0-9]*)*');
    Route::post('social/save/{social_list_id?}','admin\socialController@save')->where('social_list_id','([0-9]*)*');

    Route::post('social/delete','admin\socialController@delete');

    #endregion


    #region team

    Route::get('team','admin\TeamMemberController@index');

    Route::get('team/save/{team_id?}','admin\TeamMemberController@save');
    Route::post('team/save/{team_id?}','admin\TeamMemberController@save');

    Route::post('team/delete','admin\TeamMemberController@delete');

    #endregion



    #region specialites

    Route::get('specialites','admin\SpecialitesController@index');

    Route::get('specialites/save/{spe_id?}','admin\SpecialitesController@save');
    Route::post('specialites/save/{spe_id?}','admin\SpecialitesController@save');

    Route::post('specialites/delete','admin\SpecialitesController@delete');

    #endregion

    #region payment methods

    Route::get('payment_methods','admin\paymentMethodController@index');

    Route::get('payment_methods/save/{payment_method_id?}','admin\paymentMethodController@save')->where("payment_method_id","([0-9]*)*");
    Route::post('payment_methods/save/{payment_method_id?}','admin\paymentMethodController@save')->where("payment_method_id","([0-9]*)*");

    #endregion


    #region users(admin)

    Route::get('users/{user_status}','admin\users\usersController@index');
    Route::get('users/profile/{user_id}','admin\users\usersController@getUser')->where("user_id","([0-9]*)*");
    Route::get("users/bookings/{user_id}",'admin\users\usersController@getUserBookings');
    Route::get("users/bookings/{doctor_id}/sessions/{session_id}",'admin\users\usersController@getDoctorSessions');
    Route::post("users/bookings/{session_id}",'admin\users\usersController@changeBooking');


#endregion

    #region doctors
    Route::get('doctors','admin\users\DoctorController@index');
    Route::get('doctors/save/{doctor_id?}','admin\users\DoctorController@save');
    Route::post('doctors/save/{doctor_id?}','admin\users\DoctorController@save');
    Route::post('doctors/delete','admin\users\DoctorController@delete');
    Route::get('doctors/profile/{doctor_id}','admin\users\DoctorController@getDoctor');
    Route::get("doctors/show/changes/{doctor_id}",'admin\users\DoctorController@showChanges');
    Route::get("doctors/bio/show/changes/{doctor_id}",'admin\users\DoctorController@showBioChanges');

    Route::post('doctor/approve/{doctor_id}','admin\users\DoctorController@approveData');
    Route::post('doctor/bio/approve/{doctor_id}','admin\users\DoctorController@approveDoctorBio');

    Route::get('doctors/{doctor_id}/booking','admin\DoctorBookingController@index');
    Route::get('doctors/{doctor_id}/booking/save/{book_id?}','admin\DoctorBookingController@saveDoctorBookimg');
    Route::post('doctors/{doctor_id}/booking/save/{book_id?}','admin\DoctorBookingController@saveDoctorBookimg');
    Route::post('doctors/{doctor_id}/booking/delete','admin\DoctorBookingController@deleteDoctorBooking');

    //doctors specialites
    Route::get('doctors/{doctor_id}/spec','admin\users\DoctorController@getDoctorsSpecialites');
    Route::get('doctors/{doctor_id}/spec/save/{spe_id?}','admin\users\DoctorController@saveDoctorSpecialites');
    Route::post('doctors/{doctor_id}/spec/save/{spe_id?}','admin\users\DoctorController@saveDoctorSpecialites');
    Route::post('doctors/{doctor_id}/spec/delete','admin\users\DoctorController@deleteDoctorSpecilites');

    //doctors certificates
    Route::get('doctors/{doctor_id}/certificates','admin\CertificatesController@index');
    Route::get('doctors/{doctor_id}/certificates/save/{cer_id?}','admin\CertificatesController@save');
    Route::post('doctors/{doctor_id}/certificates/save/{cer_id?}','admin\CertificatesController@save');
    Route::post('doctors/{doctor_id}/certificates/delete','admin\CertificatesController@delete');

     //doctors sessions
     Route::get('doctors/{doctor_id}/sessions','admin\SessionController@index');
     Route::get('doctors/{doctor_id}/sessions/save/{cer_id?}','admin\SessionController@save');
     Route::post('doctors/{doctor_id}/sessions/save/{cer_id?}','admin\SessionController@save');
     Route::post('doctors/{doctor_id}/sessions/delete','admin\SessionController@delete');

    #end region

     #region users client
     Route::get('clients','admin\users\ClientController@index');
     Route::post('clients/delete','admin\users\ClientController@delete');
     Route::get('clients/profile/{client_id}','admin\users\ClientController@getClient');

     #end region


    #region admins

    Route::get('admins/edit/{user_id}', 'admin\adminController@edit')->where("user_id","([0-9]*)*");
    Route::post('admins/edit/{user_id}', 'admin\adminController@edit')->where("user_id","([0-9]*)*");

    #endregion


    #region settings

    Route::get('settings', 'admin\settingsController@index');
    Route::post('settings', 'admin\settingsController@index');

    #endregion



    #region notifications

    Route::get('notifications/show_all/{not_type}','admin\notificationController@index');
    Route::post('notifications/delete','admin\notificationController@delete');
    Route::post('notifications_seen','admin\notificationController@seen_notifications');

    #endregion


    #region support messages

    Route::get('support_messages','admin\supportMessagesController@index');
    Route::post('support_messages_seen','admin\supportMessagesController@seen_support_messages');
    Route::post('support_messages/delete','admin\supportMessagesController@delete');

    #endregion


    #region transactions

    Route::get('transactions','admin\transactionsController@index');
    Route::post('transactions/{order_id}/delete','admin\transactionsController@delete')->where("order_id","([0-9]*)*");

    #endregion


    #region categories

    Route::get('category/save_cat/{cat_type?}','admin\CategoryController@save_cat');
    Route::get('category/save_cat/{cat_type}/{cat_id?}','admin\CategoryController@save_cat');
    Route::post('category/save_cat/{cat_type}/{cat_id?}','admin\CategoryController@save_cat');
    Route::post('category/check_validation_for_save_cat/{cat_id?}','admin\CategoryController@check_validation_for_save_cat');
    Route::post('category/delete_cat','admin\CategoryController@delete_cat');
    Route::get('category/{cat_type?}/{parent_id?}','admin\CategoryController@index')->where('parent_id', '[0-9]+');

    #endregion



    #region send_general_notification
    Route::get('/send_general_notification','admin\dashboardController@send_general_notification');
    Route::post('/send_general_notification','admin\dashboardController@send_general_notification');
    #endregion



    #region promo code
    Route::get('promo_code','admin\promoController@index');
    Route::get('promo_code/save/{code_id?}','admin\promoController@save')->where("code_id","([0-9]*)*");
    Route::post('promo_code/save/{code_id?}','admin\promoController@save')->where("code_id","([0-9]*)*");
    Route::post('promo_code/delete','admin\promoController@delete');
    #endregion

    #region wallet
    Route::get('wallet/doctors/{doctor_id}','admin\WalletController@index');
    Route::get('wallet_transaction/doctors/{doctor_id}/save/{wallet_trans_id?}','admin\WalletController@save');
    Route::post('wallet_transaction/doctors/{doctor_id}/save/{wallet_trans_id?}','admin\WalletController@save');
    Route::post('wallet/doctors/{doctor_id}/delete','admin\WalletController@delete');
    Route::get("wallet_transaction/doctors/{doctor_id}",'admin\WalletController@get_wallet_transactions');
    #endregion
