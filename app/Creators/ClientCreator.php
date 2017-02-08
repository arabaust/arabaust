<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\Clients;

class ClientCreator {

    public function store($request){
        
        $data = $request->all();
        if ($request->has('password') AND $request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        if ($request->has('status') AND $data['status'] == 1) {
            $data['pending'] = 1;
        }

        // Handel date format.
        $dob = str_replace("/","-", $request->get('date_of_birth'));
        $data['date_of_birth'] = date('Y-m-d', strtotime($dob));
        
        return Clients::create($data);
    }

    public function update($request){
        $data = $request->all();

        if ($request->has('password') AND $request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        if (isset($data['status']) == 1) {
            $data['pending'] = 1;
        }

        if ($request->get('date_of_birth') !== NULL) {
            
            $dob = str_replace("/","-", $request->get('date_of_birth'));
            // Handel date format.
            $data['date_of_birth'] = date('Y-m-d', strtotime($dob));

        }
        $client_old_status = Clients::findOrFail($request->route('id'));
        Clients::findOrFail($request->route('id'))->update($data);
        return $client_old_status->status;
        //return Clients::findOrFail($request->route('id'))->update($data);
    }

}
