<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class StoreUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'      => 'required|max:30|unique:users,username',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',//work email
            'password'      => 'required|min:8|confirmed',
            'phone_1'       => 'required|numeric',
            'role_id'       => 'required'
        ];
    }
}
