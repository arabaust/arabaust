<?php

// Clients CRUD
get('clients', [
    'uses' => 'ClientsController@index',
    'as' => 'clients.index',
    'permission' => 'clients',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'Clients']
]);

get('clients/create', [
    'uses' => 'ClientsController@create',
    'as' => 'clients.create',
    'permission' => 'clients'
]);

post('clients', [
    'uses' => 'ClientsController@store',
    'as' => 'clients.store',
    'permission' => 'clients'
]);

get('clients/{id}/edit', [
    'uses' => 'ClientsController@edit',
    'as' => 'clients.edit',
    'permission' => 'clients'
]);

put('clients/{id}', [
    'uses' => 'ClientsController@update',
    'as' => 'clients.update',
    'permission' => 'clients'
]);

post('clients/{id}/delete', [
    'uses' => 'ClientsController@destroy',
    'as' => 'clients.destroy',
    'permission' => 'clients'
]);

get('clients/{id}/track', [
    'uses' => 'ClientsController@track',
    'as' => 'clients.track',
    'permission' => 'clients'
]);