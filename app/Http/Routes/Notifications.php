<?php

// Advertisers CRUD
get('notifications', [
    'uses' => 'NotificationsController@index',
    'as' => ' notifications.index',
    'permission' => 'notifications',
    'menuItem' => ['icon' => 'md md-notifications', 'title' => 'Notifications']
]);

get('notifications/create', [
    'uses' => 'NotificationsController@create',
    'as' => ' notifications.create',
    'permission' => 'notifications'
]);

post('notifications', [
    'uses' => 'NotificationsController@store',
    'as' => ' notifications.store',
    'permission' => 'notifications'
]);

get('notifications/{id}/edit', [
    'uses' => 'NotificationsController@edit',
    'as' => ' notifications.edit',
    'permission' => 'notifications'
]);

put('notifications/{id}', [
    'uses' => 'NotificationsController@update',
    'as' => ' notifications.update',
    'permission' => 'notifications'
]);

post('notifications/{id}/delete', [
    'uses' => 'NotificationsController@destroy',
    'as' => ' notifications.destroy',
    'permission' => 'notifications'
]);

get('notifications/{id}/send', [
    'uses' => 'NotificationsController@send',
    'permission' => 'notifications'
]);

get('notifications/{id}/view/{title}', [
    'uses' => 'NotificationsController@view',
    'as' => ' notifications.view',
    'permission' => 'notifications'
]);