<?php

namespace Admailer\Http\Controllers;

use Admailer\Creators\UserCreator;
use Admailer\Http\Requests\StoreUserRequest;
use Admailer\Http\Requests\UpdateUserRequest;
use Admailer\Models\Role;
use Admailer\Models\User;
use Admailer\Models\UsersTrack;
use Admailer\Repositories\UserRepository;
use Illuminate\Http\Request;
use Auth;
use Event;
use Admailer\Events\activeClientSent;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserCreator
     */
    private $userCreator;

    public function __construct(UserRepository $userRepository, UserCreator $userCreator)
    {
        $this->userRepository = $userRepository;
        $this->userCreator = $userCreator;
        $this->middleware('is.allowed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->userRepository->roles();
        $countries = countriesArray();
        $city = cityArray();
        return view('users.create', compact('roles', 'countries', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return Response
     */
    
    public function store(StoreUserRequest $request)
    {
        $this->userCreator->store($request);

        //Send email
        if($request->get('status') == 1){
            Event::fire(new activeClientSent($request->all()));
        }

        flash()->success(@trans('users.created'));
        return redirect(route('users.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       
        $user = User::findOrFail($id);
        
        if($id == Auth::user()->id)
        {
            $roles     = $this->userRepository->role(Auth::user()->role_id);
        }
        else
        {
            $roles     = $this->userRepository->roles();
        }
        
        $countries = countriesArray();
        $city      = cityArray();
        return view('users.edit', compact('user', 'roles', 'countries', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UpdateUserRequest $request
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $created_user = $this->userCreator->update($request);

        //Send email
        if($request->get('status') == 1 && $created_user == 0){
            Event::fire(new activeClientSent($request->all()));
        }
        flash()->success(@trans('users.updated'));
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function track($id)
    {
        $tracks = UsersTrack::where('user_id', $id)->get();
        return view('users.track', compact('tracks'));
    }
}
