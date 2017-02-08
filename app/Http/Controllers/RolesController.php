<?php

namespace Admailer\Http\Controllers;

use Auth;
use App;
use Admailer\Http\Requests\RolesRequest;
use Admailer\Creators\RoleCreator;
use Admailer\Models\User;
use Admailer\Models\Role;
use Admailer\Models\Permission;
use Admailer\Models\PermissionRole;
use Illuminate\Http\Request;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;
      
class RolesController extends Controller
{
    /**
     * @var RoleCreator
     */
    private $roleCreator;

    public function __construct(RoleCreator $roleCreator)
    {
        $this->roleCreator = $roleCreator;
        $this->middleware('is.allowed');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(App::getLocale() == 'ar')
        {
            $permissions = Permission::where('id', '!=', 1)->where('id', '!=', 2)->lists('permission_title_ar','id');
        }
        else
        {
            $permissions = Permission::where('id', '!=', 1)->where('id', '!=', 2)->lists('permission_title','id');
        }
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $this->roleCreator->store($request->all());
        flash()->success(@trans('roles.created'));
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $role = Role::findOrFail($id);
        if(App::getLocale() == 'ar')
        {
            $permissions = Permission::where('id', '!=', 1)->where('id', '!=', 2)->lists('permission_title_ar','id');
            $permission_roles = PermissionRole::leftJoin('permissions as p', 'p.id', '=', 'permission_role.permission_id')->where('role_id', $id)->where('p.id', '!=', 1)->where('p.id', '!=', 2)->lists('p.permission_title_ar', 'permission_role.id')->toArray();
        }
        else
        {
            $permissions = Permission::where('id', '!=', 1)->where('id', '!=', 2)->lists('permission_title','id');
            $permission_roles = PermissionRole::leftJoin('permissions as p', 'p.id', '=', 'permission_role.permission_id')->where('role_id', $id)->where('p.id', '!=', 1)->where('p.id', '!=', 2)->lists('p.permission_title', 'permission_role.id')->toArray();
        }
        

        return view('roles.edit', compact('role', 'permissions', 'permission_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id)
    {
        // If status InActive all francisee user deactived.
        if($request->get('status') == 0){
            User::where('role_id', '=', $id)->update(['status' => 0]);
        }

        $this->roleCreator->update($request->all(), $id);
        flash()->success(@trans('roles.updated'));
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleCreator->delete($id);
        return redirect(route('roles.index'));
    }
}
