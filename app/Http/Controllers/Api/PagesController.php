<?php

namespace Admailer\Http\Controllers\api;

use Config;
use Illuminate\Http\Request;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Admailer\Models\SiteTerms;
use Admailer\Models\SiteAbout;
use Admailer\Models\SiteSettings;

class PagesController extends Controller
{
  public function __construct()
  {
    Config::set('auth.model', 'Admailer\Models\Clients');
    
  }

  public function terms()
  {
    $result = SiteTerms::orderBy('created_at', 'desc')->first(['terms']);
    $terms = $result['terms'];
    return response()->json(compact('terms'));
  }

  public function about()
  {
    $result = SiteAbout::orderBy('created_at', 'desc')->first(['about']);
    $about = $result['about'];
    return response()->json(compact('about'));
  }
  
  
  
}
