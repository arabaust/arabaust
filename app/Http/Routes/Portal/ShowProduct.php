<?php

get('details/{id}', [
    'uses' => 'Portal\ProductPortalController@index',
    'as' => 'portal.details',
]);
