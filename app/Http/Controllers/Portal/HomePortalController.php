<?php

namespace Admailer\Http\Controllers\Portal;

use Admailer\Http\Controllers\Controller;

class HomePortalController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Show the application Home form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('portal.home');
    }
 
}
