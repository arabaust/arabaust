<?php

// Become Franchise CRUD
get('contact', [
    'uses' => 'ContactController@index',
    'as' => 'contact.index',
    'permission' => 'contact'
]);

get('contact/{id}/view', [
    'uses' => 'ContactController@view',
    'as' => 'contact.view',
    'permission' => 'contact'
]);

post('contact/{id}/delete', [
    'uses' => 'ContactController@destroy',
    'as' => 'contact.destroy',
    'permission' => 'contact'
]);

get('contact/{id}/read', [
    'uses' => 'ContactController@read',
    'permission' => 'contact'
]);

get('contact/{id}/unread', [
    'uses' => 'ContactController@unread',
    'permission' => 'contact'
]);