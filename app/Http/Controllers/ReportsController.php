<?php

namespace Admailer\Http\Controllers;

use Admailer\Models\Franchisees;
use Admailer\Models\ClientsTrack;
use Illuminate\Http\Request;

use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('is.allowed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reports = ClientsTrack::with(['client', 'form'])->get();
        return view('reports.index', compact('reports'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return ClientsTrack::destroy($id);
    }

    /**
     * Read the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function read($id)
    {
        ClientsTrack::findOrFail($id)->update(['read' => 1]);
        flash()->success('Record has been marked as read!');
        return redirect('reports');
    }

    /**
     * UnRead the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function unRead($id)
    {
        ClientsTrack::findOrFail($id)->update(['read' => 0]);
        flash()->success('Record has been marked as unread!');
        return redirect('reports');
    }

    

}
