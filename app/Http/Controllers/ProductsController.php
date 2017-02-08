<?php

namespace Admailer\Http\Controllers;

use Illuminate\Http\Request;
use Admailer\Creators\ProductCreator;
use Admailer\Http\Requests\StoreProductsRequest;
use Admailer\Http\Requests\ImportProductRequest;
use Admailer\Http\Requests\UpdateProductsRequest;
use Admailer\Http\Controllers\Controller;
use Admailer\Repositories\producRepository;
use Admailer\Models\Product;
use Admailer\Models\Catogery;
use App;

class ProductsController extends Controller
{
     
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var ProductCreator
     */
    private $productCreator;

    public function __construct( producRepository $productRepository, ProductCreator $productCreator)
    { 
        $this->productRepository = $productRepository;
        $this->productCreator = $productCreator;
        $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
        $products = $this->productRepository->all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = $this->productRepository->all();
        return view('products.create',compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {   

        $this->productCreator->store($request);
        flash()->success(@trans('products.created'));
        return redirect(route('products.index'));
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
        $product   = Product::findOrFail($id);
        return view('products.edit', compact('product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateProductsRequest $request, $id)
    {
        $this->productCreator->update($request,$id);
        flash()->success(@trans('products.updated'));
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->productCreator->destroy($id);
    }







    /**
     * Import list of products by excel.
     *
     * @param  null
     * @return Response
     */
    public function import()
    {
        return view('products.import');
    }


    /**
     * Store Excel sheet.
     *
     * @param  form request
     * @return null
     */
    public function store_import(ImportProductRequest $request){
        
        $excel    = $request->file('excel');
        return $this->productRepository->store_excel($excel);

    }
}
