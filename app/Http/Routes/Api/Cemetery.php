<?php

// cemeteries CRUD

Route::get( 'api_cemeteries',['uses' => 'Api\CemeteriesController@index']);