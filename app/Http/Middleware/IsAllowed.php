<?php

namespace Admailer\Http\Middleware;

use App;
use Auth;
use Route;
use Admailer\Models\User;
use Admailer\Repositories\UserRepository;
use Admailer\Models\Permission;

use Closure;

class IsAllowed
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
     
       $this->userRepository = $userRepository;
    }

    public function handle($request, Closure $next)
    {

      if(App::getLocale() != 'ar' && App::getLocale() != 'en')
      {
         abort('404');
      } 

      // extract the Controller name, remove the word controller from the name, then convert to lowercase
      list($controller, $method) = explode('@', Route::currentRouteAction());
      $controller = preg_replace('/.*\\\/', '', $controller);
      $controller = strtolower(str_replace(array('Controller'), "", $controller));
      // get the array of allowed controllers for the user
      //dd($controller);
      $allowed_controllers = $this->userRepository->allowedControllers(Auth::user()->role_id);
      //dd($allowed_controllers);

      if (is_array($allowed_controllers) && !in_array($controller, $allowed_controllers)) {
          return redirect('errors.404');
      } 

      return $next($request);
    }
}
