<?php

namespace Admailer\Http\Controllers;

use Auth;
use Admailer\Models\User;
use Admailer\Creators\UserCreator;
use Admailer\Http\Requests\ProfileRequest;
use Admailer\Repositories\UserRepository;
use Illuminate\Http\Request;
use Admailer\Http\Requests;
use Admailer\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserCreator
     */
    private $profileCreator;

    public function __construct(UserRepository $userRepository, UserCreator $profileCreator)
    {
        $this->userRepository = $userRepository;
        $this->profileCreator = $profileCreator;
        $this->middleware('is.allowed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(UserRepository $userRepository)
    {
        $profile = User::with('role')->findOrFail(Auth::user()->id);
        return view('profile.index', compact('profile', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $profile   = User::findOrFail(Auth::user()->id);
        $roles     = $this->userRepository->role( $profile->role_id);
        $countries = countriesArray();
        $city      = cityArray();
        return view('profile.edit', compact('profile', 'roles', 'countries', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ProfileRequest $request
     * @return Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $this->profileCreator->profile($request);
        flash()->success(trans('common.profile_updated'));
        return redirect(route('profile.index'));
    }


}
