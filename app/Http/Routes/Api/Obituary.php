<?php

// Obituary Routes
Route::get( 'api_obituary',['uses' => 'Api\ObituaryController@index']);

Route::get( 'api_obituary/{id}/show',['uses' => 'Api\ObituaryController@show']);

Route::post('api_obituary/create',['uses' => 'Api\ObituaryController@create']);

Route::get( 'api_obituary/{id}/edit',['uses' => 'Api\ObituaryController@edit']);

Route::post('api_obituary/{id}/update',['uses' => 'Api\ObituaryController@update']);

Route::get( 'api_obituary/{id}/destroy',['uses' => 'Api\ObituaryController@destroy']);
