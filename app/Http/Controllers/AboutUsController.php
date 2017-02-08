<?php

namespace Admailer\Http\Controllers;

use Illuminate\Http\Request;
use Admailer\Creators\AboutUsCreator;
use Admailer\Http\Requests\StoreAboutUsRequest;
use Admailer\Http\Requests\UpdateAboutUsRequest;
use Admailer\Http\Controllers\Controller;
use Admailer\Repositories\AboutUsRepository;
use Admailer\Models\AboutUs;

use App;

class AboutUsController extends Controller
{

    /**
     * @var AboutUsRepository
     */
    private $aboutRepository;
    /**
     * @var AboutUsCreator
     */
    private $aboutCreator;

    public function __construct( AboutUsRepository $aboutRepository, AboutUsCreator $aboutCreator)
    { 

        $this->aboutRepository = $aboutRepository;
        $this->aboutCreator = $aboutCreator;
        $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
        $about_us = $this->aboutRepository->all();
        return view('aboutus.index', compact('about_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutUsRequest $request)
    {   

       $this->aboutCreator->store($request);
       flash()->success(@trans('about_us.created'));
       return redirect(route('aboutus.index'));

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
        $aboutus   = AboutUs::findOrFail($id);
        return view('aboutus.edit', compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateAboutUsRequest $request, $id)
    {
        $this->aboutCreator->update($request,$id);
        flash()->success(@trans('about_us.updated'));
        return redirect(route('aboutus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->aboutCreator->destroy($id);
    }
}
