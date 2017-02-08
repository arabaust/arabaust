<?php

// Portal CRUD
Route::get( 'portal_login','Portal\AuthPortalController@index');
            
Route::post( 'post_login',[
    'uses' => 'Portal\AuthPortalController@postLogin',
    'as' => 'portal.post_login',
]);

Route::get( 'get_logout',[
    'uses' => 'Portal\AuthPortalController@getLogout',
    'as' => 'portal.get_logout',
]);

Route::get( 'facebook_login','Portal\AuthPortalController@facebook_login');
Route::get( 'facebook_callback','Portal\AuthPortalController@facebook_callback');

Route::get( 'twitter_login','Portal\AuthPortalController@twitter_login');
Route::get( 'twitter_callback','Portal\AuthPortalController@twitter_callback');

Route::get( 'google_login','Portal\AuthPortalController@google_login');
Route::get( 'google_callback','Portal\AuthPortalController@google_callback');