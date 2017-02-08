<?php

// Portal home section

Route::get('chat', 'Portal\ChatController@getChat');

Route::get('login', 'Portal\ChatController@getLogin');
 
Route::get('get_messages', 'Portal\ChatController@listMessages');
 
Route::post('messages', 'Portal\ChatController@saveMessage');
