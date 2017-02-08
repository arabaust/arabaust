<?php

namespace Admailer\Http\Controllers\Api;

use Illuminate\Http\Request;

use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class ObituaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = 'Obituary_index';
        return response()->json(compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = 'Obituary_create';
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
        $message = 'Obituary_store';
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
        $message = 'Obituary_show';
        $data    = $id;
        return response()->json(compact('message','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = 'Obituary_edit';
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
    public function update(Request $request, $id)
    {
        $message = 'Obituary_update';
        $data    = $id;
        $data_request   = $request;
        return response()->json(compact('message','data','data_request'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = 'Obituary_destroy';
        $data    = $id;
        return response()->json(compact('message','data','data_request'));
    }
}
