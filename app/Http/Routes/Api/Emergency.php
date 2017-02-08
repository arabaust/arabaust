<?php

// Emergency Routes
Route::get( 'api_emergency/{id}',['uses' => 'Api\EmergencyController@index']);

Route::get( 'api_emergency/{id}/show',['uses' => 'Api\EmergencyController@show']);

Route::post('api_emergency/create',['uses' => 'Api\EmergencyController@create']);

Route::post('api_emergency/store',['uses' => 'Api\EmergencyController@store']);

Route::get( 'api_emergency/{id}/edit',['uses' => 'Api\EmergencyController@edit']);

Route::post('api_emergency/{id}/update',['uses' => 'Api\EmergencyController@update']);

Route::get( 'api_emergency/{id}/destroy',['uses' => 'Api\EmergencyController@destroy']);

Route::post('api_emergency/{client_id}/{emergency_id}/readtoggle',['uses' => 'Api\EmergencyController@readToggle']);