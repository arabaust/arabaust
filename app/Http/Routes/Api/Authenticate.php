<?php
	
// Authenticate Routes
Route::post('api_signin',['uses' => 'Api\AuthenticateController@signin']);

Route::post('api_signup',['uses' => 'Api\AuthenticateController@signup']);

Route::get( 'api_signout',['uses' => 'Api\AuthenticateController@signout']);

Route::post('api_reset_password',['uses' => 'Api\AuthenticateController@resetPassword']);

Route::post('api_save_token', ['uses' => 'Api\AuthenticateController@save_token']);
