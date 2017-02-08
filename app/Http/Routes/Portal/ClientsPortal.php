<?php

// Portal home section

get('portal_profile', [
    'uses' => 'Portal\ClientsPortalController@index',
    'as' => 'portal.portal_profile',
]);

get('portal_profile/edit', [
    'uses' => 'Portal\ClientsPortalController@edit',
    'as' => 'portal_profile.edit',
]);

put('portal_profile/{id}/update', [
    'uses' => 'Portal\ClientsPortalController@update',
    'as' => 'portal_profile.update',
]);