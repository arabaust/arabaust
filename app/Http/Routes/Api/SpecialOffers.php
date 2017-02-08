<?php

// Special Offers Routes
Route::get( 'api_special_offers'        , 'Api\SpecialOffersController@index');

Route::get( 'api_special_offers/{id}/show',['uses' => 'Api\SpecialOffersController@show']);

Route::post('api_special_offers/store',['uses' => 'Api\SpecialOffersController@store']);