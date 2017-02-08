<?php

// Portal home section

get('/', [
    'uses' => 'Portal\HomePortalController@index',
    'as' => 'portal',
]);
