<?php

    #region Start General Function Routing

    Route::post('/general_remove_item','admin\dashboardController@general_remove_item');
    Route::post('/reorder_items','admin\dashboardController@reorder_items');
    Route::post('/new_accept_item','admin\dashboardController@new_accept_item');
    Route::post('/edit_slider_item','admin\dashboardController@edit_slider_item');

    Route::post('/general_self_edit','dashbaord_controller@general_self_edit');

    #endregion


    #region theme settings

    Route::get('theme/change_direction/{locale}', 'panels\theme\changeDirectionController@index');

    Route::get('theme/change_menu/{menu_display}', 'panels\theme\changeMenuController@index');

    Route::post('theme/dark_mode', 'panels\theme\DarkModeController@index');

    #endregion

