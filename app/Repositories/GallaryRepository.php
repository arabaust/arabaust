<?php

namespace Admailer\Repositories;

use DB;
use Admailer\Models\Gallary;
use Illuminate\Support\Facades\Auth;

class GallaryRepository {

    public function all()
    {
        return Gallary::orderBy('id', 'desc')->get();
    }

    

    
   
}