<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class StoreProductsRequest extends Request
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

        'en_name'                       => 'required',
        'en_description'                => 'required',
        'ar_name'                       => 'required',
        'ar_description'                => 'required',
        'image'                         => 'mimes:jpeg,jpg,png,bmp,gif,svg',
        'status'                        => 'required',


        ];
    }
}
