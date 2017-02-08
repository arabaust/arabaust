<?php

// use Auth;
// use Route;
// use Admailer\Models\User;
use Admailer\Repositories\UserRepository;
// use Admailer\Models\Permission;

function isAllowed($module)
{
  // get the array of allowed controllers for the user
  $userRepository = new UserRepository();
  $allowed_controllers = $userRepository->allowedControllers(Auth::user()->role_id);

  if (is_array($allowed_controllers) && in_array($module, $allowed_controllers)) {
    return true;
  }else{
    return false;
  }
}
