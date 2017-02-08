<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class UpdateClientsRequest extends Request
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
        $client_id = $this->route('id');
        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:clients,email,' . $client_id,
            'password'      => 'confirmed|min:8',
            'mobile'        => 'required|numeric',
            'date_of_birth' => 'required|date_format:d/m/Y|before:today',
        ];
    }
}
