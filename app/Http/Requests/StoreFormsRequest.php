<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class StoreFormsRequest extends Request
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
            'name'  => 'required|max:70',
            'status'=> 'required',
            'description'=> 'required',
            'icon'  => 'required|image',
            'pdf'   => 'required|mimes:pdf',
            'chapter_id'   => 'required',
        ];
    }
}
