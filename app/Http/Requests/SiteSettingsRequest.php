<?php

namespace Admailer\Http\Requests;

use Admailer\Http\Requests\Request;

class SiteSettingsRequest extends Request
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
            'name'            => 'required|max:10',
            'email'               => 'required|email',
            'notification_email'  => 'required|array',
            'phone_1'             => 'required|numeric',
            'fax'                 => 'required',
            'physical_address'    => 'required',
            'country'             => 'required',
            'city'                => 'required',
            'zip_code'            => 'required',
        ];
        
        // $emails = explode(';', $this->input('notification_email'));
        // foreach ($emails as $key => $type) {
        //     if (isset($emails[$key])) {
        //         $rules['notification_email.' . $key] = 'required|email';
        //     }
        // }

        // return $rules;
    }

    // public function messages()
    // {
    //     $messages = [];
    //     $emails = explode(';', $this->input('notification_email'));
    //     foreach ($emails as $key => $val) {
    //         $messages['notification_email.' . $key . '.email'] = 'The ' . ordinalize($key + 1) . ' email must be valid address.';
    //     }
    //     return $messages;
    // }
}
