<?php

namespace Admailer\Http\Controllers\portal;

use Event;
use Admailer\Events\activeClientSent;
use Admailer\Creators\ClientCreator;
use Admailer\Http\Requests\UpdateClientsRequest;
use Admailer\Repositories\ClientRepository;
use Admailer\Models\Clients;
use Admailer\Http\Controllers\Controller;

class ClientsPortalController extends Controller
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
     }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index()
    {

        $this->edit();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    
    public function edit()
    {
      
        $id         = session()->get('user_id');
        
        $client     = Clients::findOrFail($id);

        $d_o_b      = $client->date_of_birth != '0000-00-00' ? date('d/m/Y', strtotime($client->date_of_birth)) :'';

        $countries  = countriesAll();
        
        return view('portal.profile_edit', compact('countries', 'client', 'd_o_b'));
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
        $created_client = $this->clientCreator->update($request,$id);
        
        //Send email
        if($request->get('status') == 1 && $created_client == 0){
            Event::fire(new activeClientSent($request->all()));
        }
        
        flash()->success(@trans('clients.profile'));
        return redirect('en/portal/portal_profile/edit');
    }
}
