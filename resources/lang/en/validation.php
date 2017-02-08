<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'filled'               => 'The :attribute field is required.',
    'exists'               => 'The selected :attribute is invalid.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute should not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [


    'en_name'             => 'Category name',
    'en_description'      => 'Category description',
    'en_meta_tag_titile'  => 'Meta Tag Title',
    'ar_name'             => 'Category name in Arabic',
    'ar_description'      => 'Category description in Arabic',
    'ar_meta_tag_titile'  => 'Meta Tag Title in Arabic',
    'ar_meta_keyword'     => "Meta Keyword in Arabic",
    'en_meta_keyword'     => 'Meta Keyword',
    'ar_meta_description' => 'Meta Description description in Arabic',
    'en_meta_description' => 'Meta Description',

    'en_Name'            => 'Catogery name',
    'en_Description'     => 'Catogery description',
    'en_Meta_Tag_Titile' => 'Meta Tag Title',
    'ar_Name'            => 'Catogery name in Arabic',
    'ar_Description'     => 'Catogery description in Arabic',
    'ar_Meta_Tag_Titile' => 'Meta Tag Title in Arabic',
    


    'en_title'           => 'Articale Title',
    'ar_title'           => 'Articale Title in Arabic',
    'en_description_article'     => 'The Description in English',

    'categories_id'         => 'Category',
    'en_product_name'                   => 'Product Name',
    'en_description'                    => 'Description ',
    'description'                       => 'Description ',
    'en_meta_tag_title_name'            => 'Meta Tag Title',
    'en_meta_tag_title_description'     => 'Meta Tag Description',
    'ar_product_name'                   => 'Product Name in arabic ',
    'ar_description'                    => 'Description in arabic  ',
    'ar_meta_tag_title_name'            => 'Meta Tag Title in arabic ',
    'ar_meta_tag_title_description'     => 'Meta Tag Description: in arabic ',
    'en_model'                          => 'Model',
    'ar_model'                          => 'Model in arabic ',
    'price'                             => 'Price',
    'quantity'                          => 'Quantity',
    'manufacturer'                      => 'Manufacturer',
    'news_title'                        => 'News Title',
    'seo_url'                           => 'SEO URl',
    'publish_date'                      => 'Publish Date ',
    'lng'                               =>'long' ,
    'ar_meta_title'                          => 'Meta Tag Title in Arabic' ,
    'en_meta_title'                          => 'Meta Tag Title in English' ,
    'ar_meta_keyword'                        => 'Meta Tag Keyword in Arabic' ,
    'en_meta_keyword'                         => 'Meta Tag Keyword in English',
    'ar_meta_description'                     => 'Meta Tag Description in Arabic' ,
    'en_meta_description'                     => 'Meta Tag Description in English'

    ],
       
];