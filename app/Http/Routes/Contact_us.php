<?php

// Admin contact us CRUD
get('contact_us', [
    'uses' => 'ContactUsController@index',
    'as'   => 'contact_us.index',
    'permission' => 'contact'
]);

get('contact_us/create', [
    'uses' => 'ContactUsController@create',
    'as'   => 'contact_us.create',
    'permission' => 'pages'
]);

post('contact_us/store', [
    'uses' => 'ContactUsController@store',
    'as'   => 'contact_us.store',
    'permission' => 'pages'
]);

get('contact_us/{id}/show', [
    'uses' => 'ContactUsController@show',
    'as'   => 'contact_us.show',
    'permission' => 'pages'
]);

post('contact_us/{id}/destroy', [
    'uses' => 'ContactUsController@destroy',
    'as'   => 'contact_us.destroy',
    'permission' => 'pages'
]);

