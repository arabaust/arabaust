<?php

namespace Admailer\Repositories;
use DB;
use Admailer\Models\Media;
use Illuminate\Support\Facades\Auth;


class MediaRepository {


    public function all()
    {
        return Media::orderBy('id', 'desc')->get();
    }


    
   
    
   
}