<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => 'يجب قبول الحقل :attribute',
    'active_url'           => 'الحقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after'                => 'يجب على الحقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'alpha'                => 'يجب أن لا يحتوي الحقل :attribute سوى على حروف',
    'alpha_dash'           => 'يجب أن لا يحتوي الحقل :attribute على حروف، أرقام ومطّات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array'                => 'يجب أن يكون الحقل :attribute ًمصفوفة',
    'before'               => 'يجب على الحقل :attribute أن يكون تاريخًا سابقًا لتاريخ اليوم.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute محصورة ما بين :min و :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute محصورًا ما بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد حروف النّص :attribute محصورًا ما بين :min و :max',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر محصورًا ما بين :min و :max',
    ],
    'boolean'              => 'يجب أن تكون قيمة الحقل :attribute إما true أو false ',
    'confirmed'            => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date'                 => 'الحقل :attribute ليس تاريخًا صحيحًا',
    'date_format'          => 'لا يتوافق الحقل :attribute مع الشكل :format.',
    'different'            => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits'               => 'يجب أن يحتوي الحقل :attribute على :digits رقمًا/أرقام',
    'digits_between'       => 'يجب أن يحتوي الحقل :attribute ما بين :min و :max رقمًا/أرقام ',
    'dimensions'           => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct'             => 'للحقل :attribute قيمة مُكرّرة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists'               => 'الحقل :attribute لاغٍ',
    'file'                 => 'الـ :attribute يجب أن يكون من نوع ملف.',
    'filled'               => 'الحقل :attribute إجباري',
    'image'                => 'يجب أن يكون الحقل :attribute صورةً',
    'in'                   => 'الحقل :attribute لاغٍ',
    'in_array'             => 'الحقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون الحقل :attribute عددًا صحيحًا',
    'ip'                   => 'يجب أن يكون الحقل :attribute عنوان IP ذي بُنية صحيحة',
    'json'                 => 'يجب أن يكون الحقل :attribute نصآ من نوع JSON.',
    'max'                  => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute أصغر من :max.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أصغر من :max كيلوبايت',
        'string'  => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array'   => 'يجب أن لا يحتوي الحقل :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes'                => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'mimetypes'            => 'يجب أن يكون الحقل ملفًا من نوع : :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة الحقل :attribute أكبر من :min.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :min كيلوبايت',
        'string'  => 'يجب أن يكون طول النص :attribute أكبر من :min حروفٍ/حرفًا',
        'array'   => 'يجب أن يحتوي الحقل :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in'               => 'الحقل :attribute لاغٍ',
    'numeric'              => 'يجب على الحقل :attribute أن يكون رقمًا',
    'present'              => 'يجب تقديم الحقل :attribute',
    'regex'                => 'صيغة الحقل :attribute .غير صحيحة',
    'required'             => 'الحقل :attribute مطلوب.',
    'required_if'          => 'الحقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless'      => 'الحقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with'        => 'الحقل :attribute إذا توفّر :values.',
    'required_with_all'    => 'الحقل :attribute إذا توفّر :values.',
    'required_without'     => 'الحقل :attribute إذا لم يتوفّر :values.',
    'required_without_all' => 'الحقل :attribute إذا لم يتوفّر :values.',
    'same'                 => 'يجب أن يتطابق الحقل :attribute مع :other',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :size.',
        'file'    => 'يجب أن يكون حجم الملف :attribute أكبر من :size كيلو بايت.',
        'string'  => 'يجب أن يحتوي النص :attribute عن ما لا يقل عن  :size حرفٍ/أحرف.',
        'array'   => 'يجب أن يحتوي الحقل :attribute عن ما لا يقل عن:min عنصرٍ/عناصر',
    ],
    'string'               => 'يجب أن يكون الحقل :attribute نصآ.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique'               => 'قيمة الحقل :attribute مُستخدمة من قبل',
    'uploaded'             => 'فشل في تحميل الـ :attribute',
    'url'                  => 'صيغة الرابط :attribute غير صحيحة',
    


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
    'custom'               => [
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
    'attributes'           => [
        'en_name'               =>'اسم الفئة',
        'en_description'        =>'وصف الفئة',
        'en_meta_tag_titile'    =>'ميتا تاج',
        'ar_name'               => 'اسم الفئة بالانجليزي ',
        'ar_description'         =>'وصف الفئة بالانحليزي مطلوب',
        'ar_meta_tag_titile'     =>'ميتا تاج بالانجليزي مطلوب',
        'name'                   => 'الاسم',
        'ar_meta_keyword'        =>"ميتا كس ورد",
        'en_meta_keyword'        =>'ميتا كي ورد',
        'ar_meta_description'    =>'وصف ميتا تاج',
        'en_meta_description'    =>'وصف التا تاج',

        'en_title'              => 'العنوان بألانجليزي',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الهاتف',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'phone_1'               => 'هاتف 1',
        'image'                 => 'الصورة',
        'cemetery_id'           => 'إسم المقبرة',
        'categories_id'         => 'اسم الفئة',
        'cemetery_lat'          => 'خط العرض',
        'cemetery_lng'          => 'خط الطول',
        'cemetery_id'           => 'إسم المقبرة',
        'men_location'          => 'مكان عزاء الرجال',
        'women_location'        => 'مكان عزاء النساء',
        'men_location_lat'      => 'خط العرض لعزاء الرجال',
        'men_location_lng'      => 'خط الطول لعزاء الرجال',
        'women_location_lat'    => 'خط العرض لعزاء النساء',
        'women_location_lng'    => 'خط الطول لعزاء النساء',
        'date_of_birth'         => 'تاريخ الميلاد',
        'en_product_name'              => 'اسم المنتج بالانجليزية',
        'en_description'               => 'الوصف بالانجليزية ',
        'en_meta_tag_title_name'       => 'ميتا تاغ باللغة الانجليزية ',
        'en_meta_tag_title_description'=> 'وصف الميتا تاغ باللغة الانجليزية',
        'ar_product_name'              => 'اسم المنتج بالعربية',
        'ar_description'               => 'الوصف بالعربية ',
        'ar_meta_tag_title_name'       => 'ميتا تاغ باللغة العربية',
        'ar_meta_tag_title_description'=> 'وصف الميتا تاغ باللغة العربية',
        'en_model'                     => 'الموديل باللغة الانجليزية',
        'ar_model'                     => 'الموديل باللغة العربية',
        'price'                        => 'السعر',
        'quantity'                     => 'الكمية',
        'manufacturer'                 => 'الشركة المصنعة',
         'news_title'                  => 'عنوان الخبر',
        'seo_url'                      => 'البحث',
        'publish_date'                 => 'تاريخ النشر',
        'ar_title' => 'العنوان بالعربية',
        'en_title' => 'العنوان بالانجليزية',
        'ar_meta_data' => 'وصف ال meta بالعربية',
        'en_meta_data' => 'وصف ال meta بالانجليزية',
        'SKU'          => 'كود التخزين',
        'lng'                               =>'الطول',
        'lat'                               =>'العرض',
        'phone_number'                      =>'الهاتف',
        'ar_meta_title'                          => 'عنوان الميتا تاغ بالعربية' ,
        'en_meta_title'                          => 'عنوان الميتا تاغ بالانجليزية' ,
        'ar_meta_keyword'                        => 'ميتا تاغ كي ورد بالعربية' ,
        'en_meta_keyword'                         => 'ميتا تاغ كي ورد بالانجليزية',
        'ar_meta_description'                     => 'وصف الميتا تاغ بالعربية' ,
        'en_meta_description'                     => 'وصف الميتا تاغ بالانجليزية'
         
    ],
];