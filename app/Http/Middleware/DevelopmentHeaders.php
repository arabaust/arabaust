<?php

namespace Admailer\Http\Middleware;

use Closure;

class DevelopmentHeaders
{
  public function handle($request, Closure $next)
  {
      $response = $next($request);

//      $response->header('Access-Control-Allow-Origin', '*')
//               ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE')
//               ->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, auth')
//               ->header('Access-Control-Allow-Credentials', false);

      return $response;
  }
}
