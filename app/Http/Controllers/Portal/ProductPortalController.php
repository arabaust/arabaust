<?php

namespace Admailer\Http\Controllers\Portal;

use Illuminate\Http\Request;
use Admailer\Http\Controllers\Controller;
use Admailer\Models\Product;

use App;

class ProductPortalController extends Controller
{

    

    public function __construct( )
    { 


        // $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    { 
      $products=  Product::where('categories_id','=',$id)->where('status','=','1')->get();

      return view('portal.details', compact('products'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   

          

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateNewsRequest $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
