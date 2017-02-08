<?php

get('article', [
    'uses' => 'Portal\ArticlePortalController@index',
    'as' => 'portal.article',
     //'permission' => 'aboutus',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'AboutUs']
]);


get('article/{id}/show', [
    'uses' => 'Portal\ArticlePortalController@show',
    'as' => 'portal.show',
    // 'permission' => 'article'
]);

