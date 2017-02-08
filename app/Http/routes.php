<?php
Route::get('/', function () {
    return redirect('en/dashboard');
});

// Authentication routes...
get('login', 'Auth\AuthController@getLogin')->name('login');
post('login', 'Auth\AuthController@postLogin')->name('post_login');
get('logout', 'Auth\AuthController@getLogout')->name('logout');

// Password reset routes...
post('password/forgot', 'Auth\PasswordController@postEmail');
get('password/reset/{token}', 'Auth\PasswordController@getReset');
post('password/reset', 'Auth\PasswordController@postReset');

App::setLocale(Request::segment(1));

Route::group(['prefix' => App::getLocale()], function () {


  // Protected Routes by auth and acl middleware
  Route::group(['middleware' => ['auth']], function () {
      get('dashboard', [
          'uses' => 'DashboardController@index',
          'as' => 'dashboard',
          'permission' => 'dashboard',
          'menuItem' => ['icon' => 'md md-dashboard', 'title' => 'Dashboard']
      ]);

      // Dynamically include all files in the routes directory
      foreach (new DirectoryIterator(__DIR__ . '/Routes') as $file) {
          if (!$file->isDot() && !$file->isDir() && $file->getFilename() != '.gitignore') {
              require_once __DIR__ . '/Routes/' . $file->getFilename();
          }
      }

  });

// Portal routes
Route::group(['prefix' => App::getLocale(), 'prefix' => 'portal', 'middleware' => ['development.headers']], function()
{
  // Dynamically include all files in the routes directory
  foreach (new DirectoryIterator(__DIR__ . '/Routes/Portal') as $file) {
      if (!$file->isDot() && !$file->isDir() && $file->getFilename() != '.gitignore') {
          require_once __DIR__ . '/Routes/Portal/' . $file->getFilename();
      }
  }
});

// API routes
Route::group(['prefix' => App::getLocale(), 'prefix' => 'api', 'middleware' => ['development.headers']], function()
{

  // Dynamically include all files in the routes directory
  foreach (new DirectoryIterator(__DIR__ . '/Routes/Api') as $file) {
      if (!$file->isDot() && !$file->isDir() && $file->getFilename() != '.gitignore') {
          require_once __DIR__ . '/Routes/Api/' . $file->getFilename();
      }
  }
  // // Authenticate Controller
  // Route::post('signin', 'Api\AuthenticateController@signin');
  // Route::post('signup', 'Api\AuthenticateController@signup');
  // Route::get('signout', 'Api\AuthenticateController@signout');
  // Route::post('reset_password', 'Api\AuthenticateController@resetPassword');

  // // Notifications Controller
  // Route::get('notifications', 'Api\NotificationsController@index');

  // Route::get('notifications/{id}', 'Api\NotificationsController@show');
  // Route::get('notifications/count/all', 'Api\NotificationsController@count');
  // Route::get('notifications/count/unread', 'Api\NotificationsController@countUnRead');
  // Route::get('notifications/read/{ids}', 'Api\NotificationsController@read');
  // Route::get('notifications/unread/{ids}', 'Api\NotificationsController@unread');
  // Route::delete('notifications/{ids}', 'Api\NotificationsController@destroy');

  // Pages Controller
  // Route::get('terms', 'Api\PagesController@terms');
  // Route::get('about', 'Api\PagesController@about');

  // Profiles Controller
  // Route::get('profiles', 'Api\ProfilesController@show');
  // Route::post('profiles', 'Api\ProfilesController@update');

  // // log user actions
  // Route::get('log/app/download', 'Api\LogsController@appDownload');
  // Route::get('log/{action}', 'Api\LogsController@log');
});


});


//Route::resource('Catogries', 'CatogeryController');