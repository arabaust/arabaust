 <?php
get('news', [
    'uses' => 'Portal\NewsPortalController@index',
    'as' => 'portal.newsPortal',
     'permission' => 'news',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'News']
]);



post('news', [
    'uses' => 'Portal\NewsPortalController@store',
    'as' => 'portal.newsPortal',
    'permission' => 'news',


]);
?> 