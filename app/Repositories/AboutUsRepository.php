<?php

namespace Admailer\Repositories;

use DB;
use Admailer\Models\AboutUs;
use Illuminate\Support\Facades\Auth;

class AboutUsRepository {

    public function all()
    {
        return AboutUs::orderBy('id', 'desc')->get();
    }

    

    
   
}