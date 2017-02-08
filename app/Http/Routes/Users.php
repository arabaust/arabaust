<?php

// Users CRUD
get('users', [
    'uses' => 'UsersController@index',
    'as' => 'users.index',
    'permission' => 'users',
    'menuItem' => ['icon' => 'md md-people', 'title' => 'Users Management']
]);

get('users/create', [
    'uses' => 'UsersController@create',
    'as' => 'users.create',
    'permission' => 'users'
]);

post('users', [
    'uses' => 'UsersController@store',
    'as' => 'users.store',
    'permission' => 'users'
]);

get('users/{id}/edit', [
    'uses' => 'UsersController@edit',
    'as' => 'users.edit',
    'permission' => 'users'
]);

put('users/{id}', [
    'uses' => 'UsersController@update',
    'as' => 'users.update',
    'permission' => 'users'
]);

post('users/{id}/delete', [
    'uses' => 'UsersController@destroy',
    'as' => 'users.destroy',
    'permission' => 'users'
]);

get('users/{id}/track', [
    'uses' => 'UsersController@track',
    'as' => 'users.track',
    'permission' => 'users'
]);