<?php

namespace Admailer\Http\Middleware;

use App;
use Config;
use Closure;

class Locale
{
    public function handle($request, Closure $next, $locale)
    {

      if (in_array($locale, Config::get('app.valid_locales'))) {
        App::setLocale($locale);
      } else {
        App::setLocale(Config::get('app.locale'));
      }

      return $next($request);
    }
}
