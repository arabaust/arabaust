<?php

get('media', [
    'uses' => 'Portal\MediaPortalController@index',
    'as' => 'portal.media',
     'permission' => 'media',
]);



post('media', [
    'uses' => 'MediaPortalController@store',
    'as' => 'portal.media',
    'permission' => 'media'
]);
