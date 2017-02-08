<?php

// forms CRUD
get('forms', [
    'uses' => 'FormsController@index',
    'as' => 'forms.index',
    'permission' => 'forms',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'Forms']
]);

get('forms/create', [
    'uses' => 'FormsController@create',
    'as' => 'forms.create',
    'permission' => 'forms'
]);

post('forms', [
    'uses' => 'FormsController@store',
    'as' => 'forms.store',
    'permission' => 'forms'
]);

get('forms/{id}/edit', [
    'uses' => 'FormsController@edit',
    'as' => 'forms.edit',
    'permission' => 'forms'
]);

put('forms/{id}', [
    'uses' => 'FormsController@update',
    'as' => 'forms.update',
    'permission' => 'forms'
]);

post('forms/{id}/delete', [
    'uses' => 'FormsController@destroy',
    'as' => 'forms.destroy',
    'permission' => 'forms'
]);

get('forms/{id}/deleteOldPdf', [
    'uses' => 'FormsController@deleteOldPdf',
    'as' => 'forms.deleteOldPdf',
    'permission' => 'forms'
]);

get('forms/{id}/track', [
    'uses' => 'FormsController@track',
    'as' => 'forms.track',
    'permission' => 'forms'
]);

get('forms/{id}/related', [
    'uses' => 'FormsController@related',
    'as' => 'forms.related',
    'permission' => 'forms'
]);

get('forms/{id}/up/{order_num}', [
    'uses' => 'FormsController@up',
    'as' => 'forms.up',
    'permission' => 'forms'
]);

get('forms/{id}/down/{order_num}', [
    'uses' => 'FormsController@down',
    'as' => 'forms.down',
    'permission' => 'forms'
]);