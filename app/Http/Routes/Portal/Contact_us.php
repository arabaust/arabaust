
<?php

// Portal contact section

Route::get('contact_us', [
    'uses' =>  'Portal\ContactPortalController@create',
    'as'    => 'contact_us.create',
]);

Route::post('contact_us/store', [
    'uses' =>  'Portal\ContactPortalController@store',
    'as'    => 'contact_us.store',
]);