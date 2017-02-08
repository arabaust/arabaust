<?php

namespace Admailer\Http\Controllers\Api;

use Illuminate\Http\Request;
use Admailer\Models\Emergency;
use Admailer\Models\Occasions;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Emergency  = Emergency::limit(5)->get();
        $Occasions  = Occasions::limit(5)->get();
        return response()->json(compact('Emergency','Occasions'));
    }

}
