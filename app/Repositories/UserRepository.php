<?php

namespace Admailer\Repositories;


use Admailer\Models\Organisation;
use Admailer\Models\Role;
use Admailer\Models\User;
use Admailer\Models\Permission;
use Illuminate\Support\Facades\Auth;

class UserRepository {

    public function all(){
        return User::with('role')->get();
        // if (Auth::user()->is('admin')) return User::with('role')->get();
        // return User::with(['organisation', 'role'])->where('organisation_id', Auth::user()->organisation_id)->where('role_id', '!=', 1)->get();
    }

    public function roles(){
        return Role::where('status', '=', 1)->orderBy('role_title', 'asc')->lists('role_title', 'id');

        // if (Auth::user()->is('admin')) return Role::orderBy('id', 'desc')->lists('role_title', 'id');
        // return Role::where('role_title', '!=', 'admin')->orderBy('id', 'desc')->lists('role_title', 'id');
    }

     public function role($id){
        return Role::where('id','=',$id)->where('status', '=', 1)->orderBy('role_title', 'asc')->lists('role_title', 'id');
    }

    public function allowedControllers($role_id)
    {
      return Permission::join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
                            ->where('permission_role.role_id', '=', $role_id)
                            ->lists('permission_slug')->toArray();
    }

}
