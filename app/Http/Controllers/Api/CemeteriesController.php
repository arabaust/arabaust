<?php

namespace Admailer\Http\Controllers\Api;

use Admailer\Models\Cemeteries;
use Admailer\Http\Controllers\Controller;

class CemeteriesController extends Controller
{

    public function __construct()
    {


    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cemeteries = Cemeteries::get();
        
        return response()->json(compact('cemeteries'));
    }

}
