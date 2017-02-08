<?php

namespace Admailer\Http\Controllers\Api;

use Illuminate\Http\Request;

use Admailer\Http\Requests\StoreEmergencyRequest;
use Admailer\Models\Emergency;
use Admailer\Models\EmergencyNotifications;
use Admailer\Creators\EmergencyCreator;
use Admailer\Repositories\EmergencyRepository;
use Admailer\Http\Controllers\Controller;

class EmergencyController extends Controller
{
     /**
     * @var EmergencyRepository
     */
    private $emergencyRepository;

    /**
     * @var UserCreator
     */
    private $emergencyCreator;

  
    public function __construct(EmergencyRepository $emergencyRepository, EmergencyCreator $emergencyCreator)
    {
        $this->middleware('client.check');
        
        $this->emergencyRepository = $emergencyRepository;
        
        $this->emergencyCreator = $emergencyCreator;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($id) {
        
        $data = $this->emergencyRepository->get_emergency($id);
        
        return response()->json(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create() {
        
        $message = 'Emergency_create';
        
        return response()->json(compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreEmergencyRequest $request) {

        $Emergency  = $this->emergencyCreator->store($request);
        
        return response()->json(compact('Emergency'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)  {
        
        $Info       = $this->emergencyRepository->get_cemeteries($id);
        
        $Emergency  = $Info[0];
        
        return response()->json(compact('Emergency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id) {
        
        $Emergency = Emergency::where('id', $id)->get();
        
        return response()->json(compact('Emergency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function update(EmergencyRequest $request, $id)
    {
        $Emergency  = $this->emergencyCreator->update($request,$id);
        
        return response()->json(compact('Emergency'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $Emergency = Emergency::destroy($id);
        
        return response()->json(compact('Emergency'));
    }
    
    /**
     * Update the read resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $client_id     Client ID
     * @param  int  $emergency_id  Emergency ID
         * 
     * @return \Illuminate\Http\Response
     */
    
    public function readToggle(Request $request, $client_id ,$emergency_id)
    {
        
        $where      = array( 'client_id' => $client_id, 'emergency_id' => $emergency_id );
        
        EmergencyNotifications::where($where)->update($request->all());
        
        $val        = $request->only('read');
        
        $read       = $val['read'];
        
        return response()->json(compact('read'));
    }
    
}
