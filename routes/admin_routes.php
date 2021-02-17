<?php


    Route::get('dashboard','admin\dashboardController@index');


    #region langs

    Route::get('langs','admin\langsController@index');

    Route::get('langs/save/{lang_id?}','admin\langsController@save')->where('lang_id','([0-9]*)*');
    Route::post('langs/save/{lang_id?}','admin\langsController@save')->where('lang_id','([0-9]*)*');

    Route::post('langs/delete','admin\langsController@delete');

    #endregion


    #region days

    Route::get('days','admin\daysController@index');

    Route::get('days/save/{day_id?}','admin\daysController@save')->where('day_id','([0-9]*)*');
    Route::post('days/save/{day_id?}','admin\daysController@save')->where('day_id','([0-9]*)*');

    Route::post('days/delete','admin\daysController@delete');

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


    #region cityList

    Route::get('cityList','admin\cityListController@index');

    Route::get('cityList/save/{city_id?}','admin\cityListController@save')->where("city_id","([1-9]*)([0-9]*)");
    Route::post('cityList/save/{city_id?}','admin\cityListController@save')->where("day_id","([1-9]*)([0-9]*)");

    Route::post('cityList/delete','admin\cityListController@delete');

    #endregion


    #region districtList

    Route::get('districtList/{city_id?}','admin\districtListController@index')->where("city_id","([1-9]*)([0-9]*)");

    Route::get('districtList/save/{district_id?}','admin\districtListController@save')->where("district_id","([1-9]*)([0-9]*)");
    Route::post('districtList/save/{district_id?}','admin\districtListController@save')->where("district_id","([1-9]*)([0-9]*)");

    Route::post('districtList/delete','admin\districtListController@delete');

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



    #region order reviews

      Route::get('orders/reviews/{status}','admin\orders\ordersReviewsController@index');
      Route::post('orders/{order_id}/reviews/manage_status','admin\orders\ordersReviewsController@manage_status')->where("order_id","([0-9]*)*");
      Route::get('orders/{order_id}/reviews/{status}','admin\orders\ordersReviewsController@get_reviews')->where("order_id","([0-9]*)*");
      Route::post('orders/{order_id}/reviews/delete','admin\orders\ordersReviewsController@delete')->where("order_id","([0-9]*)*");

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


   #region plans

    Route::get('plans','admin\PlansController@index');

    Route::get('plans/save/{plan_id?}','admin\PlansController@save')->where("plan_id","([0-9]*)*");
    Route::post('plans/save/{plan_id?}','admin\PlansController@save')->where("plan_id","([0-9]*)*");
    Route::post('plans/delete','admin\PlansController@delete');

   #endregion



    #region brands

    Route::get('brands','admin\brands\brandsController@index');

    Route::get('brands/save/{brand_id?}','admin\brands\brandsController@save')->where("brand_id","([0-9]*)*");
    Route::post('brands/save/{brand_id?}','admin\brands\brandsController@save')->where("brand_id","([0-9]*)*");
    Route::post('brands/delete','admin\brands\brandsController@delete');

    #endregion



    #region branches

    Route::get('brands/{brand_id}/branches','admin\brands\brandBranchesController@index')->where("brand_id","([0-9]*)*");

    Route::get('brands/{brand_id}/branches/save/{branch_id?}','admin\brands\brandBranchesController@save')->where("brand_id","([0-9]*)*")->where("branch_id","([0-9]*)*");
    Route::post('brands/{brand_id}/branches/save/{branch_id?}','admin\brands\brandBranchesController@save')->where("brand_id","([0-9]*)*")->where("branch_id","([0-9]*)*");
    Route::post('brands/{brand_id}/branches/delete','admin\brands\brandBranchesController@delete')->where("brand_id","([0-9]*)*");

    #endregion


    #region offers type

    Route::get('offers/types','admin\offersTypeController@index');

    Route::get('offers/types/save/{offer_type_id?}','admin\offersTypeController@save')->where("offer_type_id","([0-9]*)*");
    Route::post('offers/types/save/{offer_type_id?}','admin\offersTypeController@save')->where("offer_type_id","([0-9]*)*");
    Route::post('offers/types/delete','admin\offersTypeController@delete');
    #endregion


    #region branches offers

    Route::get('branches/{branch_id}/offers','admin\branches\offersController@index')->where("branch_id","([0-9]*)*");
    Route::get('branches/{branch_id}/offers/save/{branch_offer_id?}','admin\branches\offersController@save')->where("branch_id","([0-9]*)*")->where("branch_offer_id","([0-9]*)*");
    Route::post('branches/{branch_id}/offers/save/{branch_offer_id?}','admin\branches\offersController@save')->where("branch_id","([0-9]*)*")->where("branch_offer_id","([0-9]*)*");
    Route::post('branches/offers/delete','admin\branches\offersController@delete');
    #endregion


    #region brand offers
    Route::get('brands/{brand_id}/offers','admin\brands\brandOffersController@index')->where("branch_id","([0-9]*)*");
    Route::get('brands/{brand_id}/offers/save/{offer_id?}','admin\brands\brandOffersController@save')->where("brand_id","([0-9]*)*")->where("offer_id","([0-9]*)*");
    Route::post('brands/{brand_id}/offers/save/{offer_id?}','admin\brands\brandOffersController@save')->where("brand_id","([0-9]*)*")->where("offer_id","([0-9]*)*");
    Route::post('brands/offers/delete','admin\brands\brandOffersController@delete');
    Route::post("offers/remove_step_item", 'admin\brands\brandOffersController@remove_step_item');

    #endregion


    #region send_general_notification
    Route::get('/send_general_notification','admin\dashboardController@send_general_notification');
    Route::post('/send_general_notification','admin\dashboardController@send_general_notification');
    #endregion


    #region redeem rules

    Route::get('redeem_rules','admin\redeemController@index');
    Route::get('redeem_rules/save/{red_id?}','admin\redeemController@save')->where("red_id","([0-9]*)*");
    Route::post('redeem_rules/save/{red_id?}','admin\redeemController@save')->where("red_id","([0-9]*)*");
    Route::post('redeem_rules/delete','admin\redeemController@delete');

    #endregion


    #region branches working days

    Route::get('branches/{branch_id}/working_days','admin\branches\branchesWorkingDaysController@index')->where("branch_id","([0-9]*)*");

    Route::get('branches/{branch_id}/working_days/save/{id?}','admin\branches\branchesWorkingDaysController@save')->where("branch_id","([0-9]*)*")->where("id","([0-9]*)*");
    Route::post('branches/{branch_id}/working_days/save/{id?}','admin\branches\branchesWorkingDaysController@save')->where("branch_id","([0-9]*)*")->where("id","([0-9]*)*");

    Route::post('branches/{branch_id}/working_days/delete','admin\branches\branchesWorkingDaysController@delete')->where("branch_id","([0-9]*)*");

    #endregion


    #region orders
    Route::get('branches/{branch_id}/orders','admin\branches\branchesOrdersController@index');
    Route::get('branches/{branch_id}/orders/save/{order_id?}','admin\branches\branchesOrdersController@save')->where("branch_id","([0-9]*)*")->where("order_id","([0-9]*)*");
    Route::post('branches/{branch_id}/orders/save/{order_id?}','admin\branches\branchesOrdersController@save')->where("branch_id","([0-9]*)*")->where("order_id","([0-9]*)*");
    #endregion

    #region promo code
    Route::get('promo_code','admin\promoController@index');
    Route::get('promo_code/save/{code_id?}','admin\promoController@save')->where("code_id","([0-9]*)*");
    Route::post('promo_code/save/{code_id?}','admin\promoController@save')->where("code_id","([0-9]*)*");
    Route::post('promo_code/delete','admin\promoController@delete');
    #endregion
