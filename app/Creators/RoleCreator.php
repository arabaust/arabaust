<?php

namespace Admailer\Creators;


use Admailer\Models\Role;
use Admailer\Models\PermissionRole;

class RoleCreator
{

    public function store($request)
    {
        $role              = new Role();
        $role->role_title  = $request['role_title'];
        $role->status      = $request['status'];
        $role->description = $request['description'];
        $role->save();

        array_push($request['permission_id'],'1','2');
        
        foreach ($request['permission_id'] as $key => $value) {
            $permission_role = new PermissionRole();
            $permission_role->role_id = $role->id;
            $permission_role->permission_id = $value;
            $permission_role->save();
        }

        return $role;
    }

    public function update($request, $id)
    {
        $role = Role::findOrFail($id);
        PermissionRole::where('role_id', $id)->delete();

        $role->role_title  = $request['role_title'];
        $role->status      = $request['status'];
        $role->description = $request['description'];
        $role->save();

        array_push($request['permission_id'],'1','2');

        foreach ($request['permission_id'] as $key => $value) {
            $permission_role = new PermissionRole();
            $permission_role->role_id = $role->id;
            $permission_role->permission_id = $value;
            $permission_role->save();
        }

    }

    public function delete($id){
        PermissionRole::where('role_id', $id)->delete();
        return Role::destroy($id);
    }

}