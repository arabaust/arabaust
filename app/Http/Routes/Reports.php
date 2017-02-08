<?php

// Reports CRUD
get('reports', [
    'uses' => 'ReportsController@index',
    'as' => 'reports.index',
    'permission' => 'reports'
]);

post('reports/{id}/delete', [
    'uses' => 'ReportsController@destroy',
    'as' => 'reports.destroy',
    'permission' => 'reports'
]);

get('reports/{id}/read', [
    'uses' => 'ReportsController@read',
    'permission' => 'reports'
]);

get('reports/{id}/unread', [
    'uses' => 'ReportsController@unread',
    'permission' => 'reports'
]);
