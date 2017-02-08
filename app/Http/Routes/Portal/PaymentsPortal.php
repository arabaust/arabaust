<?php

// Portal home section

get('portal_payment', [
    'uses' => 'Portal\PaymentsPortalController@index',
    'as' => 'portal.payment',
]);

get('portal_response', [
    'uses' => 'Portal\PaymentsPortalController@response',
    'as' => 'portal.response',
]);

