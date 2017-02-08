<?php

namespace Admailer\Creators;


use Admailer\Models\User;

class UserCreator {

    public function store($request){
        $data = $request->all();
        if ($request->has('password') AND $request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
        return User::create($data);
    }

    public function update($request){
        $data = $request->all();
       
        if ($request->has('password') AND $request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        $client_old_status = User::findOrFail($request->route('id'));
        User::findOrFail($request->route('id'))->update($data);
        return $client_old_status->status;
    }

    public function profile($request){
        $data = $request->all();

        unset($data['role_id']);
        unset($data['status']);

        if ($request->has('password') AND $request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }
        return User::findOrFail($request->route('id'))->update($data);
    }

}