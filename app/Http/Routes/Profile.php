   <?php

// Users CRUD
get('profile', [
    'uses' => 'ProfileController@index',
    'as' => 'profile.index',
    'permission' => 'profile'
]);

get('profile/{id}/edit', [
    'uses' => 'ProfileController@edit',
    'as' => 'profile.edit',
    'permission' => 'profile'
]);

put('profile/{id}', [
    'uses' => 'ProfileController@update',
    'as' => 'profile.update',
    'permission' => 'profile'
]);
