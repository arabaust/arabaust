<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Session ;
use DB;


class PageCreator {

    public function store($request){

        //upload page image
        if ($request->hasFile('image')) {

          $pageImage        = $request->file('image');
          $imageName        = $pageImage->getClientOriginalName();
           
          $page                   = new Page();
          $page->ar_title         = $request['ar_title'];
          $page->en_title         = $request['en_title'];
          $page->ar_description   = $request['ar_description'];
          $page->en_description   = $request['en_description'];
          $page->ar_meta_title    = $request['ar_meta_title'];
          $page->en_meta_title    = $request['en_meta_title'];
          $page->ar_meta_keyword     = $request['ar_meta_keyword'];
          $page->en_meta_keyword     = $request['en_meta_keyword'];
          $page->ar_meta_description = $request['ar_meta_description'];
          $page->en_meta_description = $request['en_meta_description'];
          $page->image           = $imageName;
          $page->status          = $request['status'];
          
          $page->save(); 

          $imageUpload      = $pageImage->move
                            (public_path().'/files/pages/' . $page->id, $imageName);                    
        }
    }

    public function update($request){
        
        $id = $request->route('id') ;
        
        $page = Page::find($id);
       
        if ($request->hasFile('image')) 
          {
                
                $pageImage        = $request->file('image');
                $imageName        = $pageImage->getClientOriginalName();
                unlink(public_path().'/files/pages/' . $page->id .'/'. $page->image);
                $imageUpload      = $pageImage->move
                                  (public_path().'/files/pages/' . $page->id, $imageName);
                $page->image      = $imageName;

            }          
        
        $page->ar_title        = $request['ar_title'];
        $page->en_title        = $request['en_title'];
        $page->ar_description  = $request['ar_description'];
        $page->en_description  = $request['en_description'];
        $page->ar_meta_title    = $request['ar_meta_title'];
        $page->en_meta_title    = $request['en_meta_title'];
        $page->ar_meta_keyword     = $request['ar_meta_keyword'];
        $page->en_meta_keyword     = $request['en_meta_keyword'];
        $page->ar_meta_description = $request['ar_meta_description'];
        $page->en_meta_description = $request['en_meta_description'];
        $page->status          = $request['status'];
        
        $page->save();

        

    }

}
