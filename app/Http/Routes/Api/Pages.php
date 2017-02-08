<?php

// Pages Routes

Route::get( 'api_terms',['uses' => 'Api\PagesController@terms']);

Route::get( 'api_about',['uses' => 'Api\PagesController@about']);