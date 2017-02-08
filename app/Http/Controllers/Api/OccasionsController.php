<?php

namespace Admailer\Http\Controllers\Api;

use Illuminate\Http\Request;
use Admailer\Http\Requests\StoreOccasionsRequest;
use Admailer\Http\Requests\UpdateOccasionsRequest;
use Admailer\Creators\OccasionCreator;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;
use Admailer\Models\Occasions;
use Admailer\Repositories\OccasionRepository;

class OccasionsController extends Controller
{
    
    private $occasionCreator;
    
    private $occasionRepository;

    public function __construct(OccasionRepository $occasionRepository, OccasionCreator $occasionCreator)
    {
        $this->middleware('client.check');
        $this->occasionCreator = $occasionCreator;
        $this->occasionRepository = $occasionRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Occasions  = $this->occasionRepository->get_occasions();
        
        return response()->json(compact('Occasions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = 'Occasions_create';
        return response()->json(compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->file('image'));
        $Occasions  = $this->occasionCreator->store($request);
        
        return response()->json(compact('Occasions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Occasions = $this->occasionRepository->occasions_by_id($id);
        
        return response()->json(compact('Occasions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = 'Occasions_edit';
        $data    = $id;
        return response()->json(compact('message','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOccasionsRequest $request, $id)
    {
        
        $Occasions  = $this->occasionCreator->update($request,$id);
        
        return response()->json(compact('Occasions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Occasions = Occasions::destroy($id);
        return response()->json(compact('Occasions'));
    }
}
