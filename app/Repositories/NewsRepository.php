<?php

namespace Admailer\Repositories;

use DB;
use Admailer\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsRepository {

    public function all()
    {
        return News::orderBy('id', 'desc')->get();
    }

    
    public function get_product(){
        
        $News  = News::orderBy('id', 'desc')->where('status',1)->get();
        
        foreach($News as $val)
        {
            //This Function To Get The Image Thumb Name
            $val['image'] = get_image_thumb($val['image']);

        }
        
        return $News;
    }
    
   
}