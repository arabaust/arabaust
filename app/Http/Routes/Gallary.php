<?php

get('gallary', [
    'uses' => 'GallaryController@index',
    'as' => 'gallary.index',
    'permission' => 'products',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'Products']
]);
get('gallary/create', [
    'uses' => 'GallaryController@create',
    'as' => 'gallary.create',
    'permission' => 'products'
]);
post('gallary', [
    'uses' => 'GallaryController@store',
    'as' => 'gallary.store',
    'permission' => 'Users'
]);
get('gallary/{id}/edit', [
    'uses' => 'GallaryController@edit',
    'as' => 'gallary.edit',
    'permission' => 'products'
]);
put('gallary/{id}', [
    'uses' => 'GallaryController@update',
    'as'   => 'gallary.update',
    'permission' => 'products'
]);
post('gallary/{id}/delete', [
    'uses' => 'GallaryController@destroy',
    'as'   => 'gallary.destroy',
    'permission' => 'products'
]);

