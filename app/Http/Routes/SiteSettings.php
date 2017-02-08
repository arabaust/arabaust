<?php

// Site Settings CRUD
get('settings', [
    'uses' => 'SettingsController@index',
    'as' => 'settings.index',
    'permission' => 'settings'
]);

get('settings/{id}/edit', [
    'uses' => 'SettingsController@edit',
    'as' => 'settings.edit',
    'permission' => 'settings'
]);

put('settings/{id}', [
    'uses' => 'SettingsController@update',
    'as' => 'settings.update',
    'permission' => 'settings'
]);

get('secuirty', [
    'uses' => 'SettingsController@secuirty',
    'as' => 'settings.secuirty',
    'permission' => 'settings'
]);

put('secuirty/{id}', [
    'uses' => 'SettingsController@updateSecuirty',
    'as' => 'settings.updateSecuirty',
    'permission' => 'settings'
]);

get('terms', [
    'uses' => 'SettingsController@terms',
    'as' => 'settings.terms',
    'permission' => 'settings'
]);

put('terms/{id}', [
    'uses' => 'SettingsController@updateTerms',
    'as' => 'settings.updateTerms',
    'permission' => 'settings'
]);

get('about', [
    'uses' => 'SettingsController@about',
    'as' => 'settings.about',
    'permission' => 'settings'
]);

put('about/{id}', [
    'uses' => 'SettingsController@updateAbout',
    'as' => 'settings.updateAbout',
    'permission' => 'settings'
]);

