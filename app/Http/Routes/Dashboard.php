<?php

// Dashboard
get('locale/{locale}', [
    'uses' => 'DashboardController@changeLocale',
    'as' => 'dashboard.changeLocale',
    'permission' => 'dashboard'
]);