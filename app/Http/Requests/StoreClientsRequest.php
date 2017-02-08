<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class StoreClientsRequest extends Request
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
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:clients,email',
            'password'      => 'required|min:8|confirmed',
            'mobile'        => 'required|numeric',
            'date_of_birth' => 'required|date_format:d/m/Y|before:today',
        ];
    }
}
