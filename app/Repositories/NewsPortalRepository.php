<?php

namespace Admailer\Repositories;

use DB;
use Admailer\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsPortalRepository {

    public function all()
    {
        return News::orderBy('id', 'desc')->where('status','=','1')->get();
    }

    

    
   
}