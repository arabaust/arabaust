<?php

// Profiles Routes
Route::get( 'api_profiles/{id}/show',['uses' => 'Api\ProfilesController@show']);

Route::post('api_profiles/{id}/update',['uses' => 'Api\ProfilesController@update']);