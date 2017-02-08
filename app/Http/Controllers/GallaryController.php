<?php

namespace Admailer\Http\Controllers;

use Illuminate\Http\Request;
use Admailer\Creators\GallaryCreator;
use Admailer\Http\Requests\StoreGallaryRequest;
use Admailer\Http\Requests\UpdateGallaryRequest;
use Admailer\Http\Controllers\Controller;
use Admailer\Repositories\GallaryRepository;
use Admailer\Models\Gallary;

use App;

class GallaryController extends Controller
{

    /**
     * @var GallaryRepository
     */
    private $gallaryRepository;
    /**
     * @var GallaryCreator
     */
    private $gallaryCreator;

    public function __construct( GallaryRepository $gallaryRepository, GallaryCreator $gallaryCreator)
    { 

        $this->gallaryRepository = $gallaryRepository;
        $this->gallaryCreator = $gallaryCreator;
        // $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
        $gallary = $this->gallaryRepository->all();
        return view('gallary.index', compact('gallary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGallaryRequest $request)
    {   

       $this->gallaryCreator->store($request);
       flash()->success(@trans('about_us.created'));
       return redirect(route('gallary.index'));

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
        $gallary  = Gallary::findOrFail($id);
        return view('gallary.edit', compact('gallary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateGallaryRequest $request, $id)
    {
        $this->gallaryCreator->update($request,$id);
        flash()->success(@trans('about_us.updated'));
        return redirect(route('gallary.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->gallaryCreator->destroy($id);
    }
}
