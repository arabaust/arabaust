<?php

namespace Admailer\Http\Controllers;

use Event;
use Admailer\Events\activeClientSent;
use Admailer\Creators\ClientCreator;
use Admailer\Http\Requests\StoreClientsRequest;
use Admailer\Http\Requests\UpdateClientsRequest;
use Admailer\Repositories\ClientRepository;
use Admailer\Models\Clients;
use Illuminate\Http\Request;

use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserCreator
     */
    private $clientCreator;

    public function __construct(ClientRepository $clientRepository, ClientCreator $clientCreator)
    {

        $this->clientRepository = $clientRepository;
        $this->clientCreator = $clientCreator;
        $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Clients::get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        $countries = countriesAll();
        return view('clients.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClientsRequest $request
     * @return Response
     */
    public function store(StoreClientsRequest $request)
    {
        $created_client = $this->clientCreator->store($request);
        
        //Send email
        if($request->get('status') == 1){
            Event::fire(new activeClientSent($request->all()));
        }
        flash()->success(@trans('clients.created'));
        return redirect(route('clients.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $client      = Clients::findOrFail($id);
        $d_o_b = date('d/m/Y', strtotime($client->date_of_birth));

        $countries   = countriesAll();

        return view('clients.edit', compact('countries', 'client', 'd_o_b'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UpdateClientsRequest $request
     * @return Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        $created_client = $this->clientCreator->update($request);
        
        //Send email
        if($request->get('status') == 1 && $created_client == 0){
            Event::fire(new activeClientSent($request->all()));
        }
        
        flash()->success(@trans('clients.updated'));
        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Clients::destroy($id);
    }
 
}
