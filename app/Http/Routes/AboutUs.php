<?php

get('aboutus', [
    'uses' => 'AboutUsController@index',
    'as' => 'aboutus.index',
     'permission' => 'aboutus',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'AboutUs']
]);

get('aboutus/create', [
    'uses' => 'AboutUsController@create',
    'as' => 'aboutus.create',
    'permission' => 'aboutus'
]);


post('aboutus', [
    'uses' => 'AboutUsController@store',
    'as' => 'aboutus.store',
    'permission' => 'aboutus'
]);
get('aboutus/{id}/edit', [
    'uses' => 'AboutUsController@edit',
    'as' => 'aboutus.edit',
    'permission' => 'aboutus'
]);


put('aboutus/{id}', [
    'uses' => 'AboutUsController@update',
    'as' => 'aboutus.update',
    'permission' => 'aboutus'
]);



post('aboutus/{id}/delete', [
    'uses' => 'AboutUsController@destroy',
    'as' => 'aboutus.destroy',
    'permission' => 'aboutus'
]);
