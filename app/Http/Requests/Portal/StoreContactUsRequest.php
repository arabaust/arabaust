<?php

namespace Admailer\Http\Requests\Portal;

use Admailer\Http\Requests\Request;

class StoreContactUsRequest extends Request
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
            'title'          => 'required',
            'description'    => 'required',
            'email'          => 'required|email',
            'phone'          => 'required|numeric',
        ];
    }
}
