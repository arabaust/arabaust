<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class UpdateUserRequest extends Request
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
        $user_id = $this->route('id');
        return [
            'username'      => 'required|max:30|unique:users,username,' . $user_id,
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email,' . $user_id,//work email
            'password'      => 'min:8|confirmed',
            'phone_1'       => 'required|numeric',
            'role_id'       => 'required'
        ];
    }
}
