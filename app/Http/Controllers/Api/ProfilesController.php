<?php

namespace Admailer\Http\Controllers\Api;

use Illuminate\Http\Request;
use Admailer\Http\Requests\ProfileRequest;
use Admailer\Creators\ClientCreator;
use Admailer\Http\Controllers\Controller;
use Admailer\Models\Clients;

class ProfilesController extends Controller
{
    
    private $clientCreator;

    public function __construct(ClientCreator $clientCreator)
    {
        $this->clientCreator = $clientCreator;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = 'Profiles_index';
        return response()->json(compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = 'Profiles_create';
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
        $message = 'Profiles_store';
        $data    = $request;
        return response()->json(compact('message','data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = Clients::where('id', $id)->get();
        
        return response()->json(compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = 'Profiles_edit';
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
    public function update(ProfileRequest $request, $id)
    {
        $Profiles  = $this->clientCreator->update($request,$id);
        
        return response()->json(compact('Profiles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'Profiles_destroy';
        $data    = $id;
        return response()->json(compact('message','data','data_request'));
    }
}
