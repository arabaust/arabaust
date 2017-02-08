<?php

get('aboutus', [
    'uses' => 'Portal\AboutPortalController@index',
    'as' => 'portal.aboutus',
     'permission' => 'aboutus',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'AboutUs']
]);



post('aboutus', [
    'uses' => 'AboutPortalController@store',
    'as' => 'portal.aboutus',
    'permission' => 'aboutus'
]);
