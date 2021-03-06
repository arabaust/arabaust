<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class StoreAboutUsRequest extends Request
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


        'title'       => 'required',
        'description' => 'required',
        'image'       => 'mimes:jpeg,jpg,png,bmp,gif,svg',
        

        ];
    }
}
