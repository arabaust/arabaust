<?php

// Roles CRUD
get('roles', [
    'uses' => 'RolesController@index',
    'as' => 'roles.index',
    'permission' => 'roles',
    'menuItem' => ['icon' => 'md md-people', 'title' => 'Roles & Permission Management']
]);

get('roles/create', [
    'uses' => 'RolesController@create',
    'as' => 'roles.create',
    'permission' => 'roles'
]);

post('roles', [
    'uses' => 'RolesController@store',
    'as' => 'roles.store',
    'permission' => 'roles'
]);

get('roles/{id}/edit', [
    'uses' => 'RolesController@edit',
    'as' => 'roles.edit',
    'permission' => 'roles'
]);

put('roles/{id}', [
    'uses' => 'RolesController@update',
    'as' => 'roles.update',
    'permission' => 'roles'
]);

post('roles/{id}/delete', [
    'uses' => 'RolesController@destroy',
    'as' => 'roles.destroy',
    'permission' => 'roles'
]);