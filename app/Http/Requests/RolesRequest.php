<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class RolesRequest extends Request
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
            'role_title' => 'required|max:30',
            'status' => 'required',
            'permission_id' => 'required|array',
            'description' => 'required',
        ];
    }
}
