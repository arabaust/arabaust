<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\SiteAbout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Admailer\Repositories\AboutUsRepository;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class AboutUsCreator {

    public function store($request){
   
    }

    public function update($request, $id)
    {
        $imageName = '';
        $about_us = SiteAbout::findOrFail($id);
        if ($request->hasFile('image')) {

            // Delete old about_us image.
            if(is_dir(public_path() . '/files/about_us/' . $id))
            {
                if(is_file(public_path() . '/files/about_us/' . $id . '/' . $about_us->image))
                {
                    unlink(public_path() . '/files/about_us/' . $id . '/' . $about_us->image);
                }
                if(is_file(public_path() . '/files/about_us/' . $id . '/thumb-' . $about_us->image))
                {
                    unlink(public_path() . '/files/about_us/' . $id . '/thumb-' . $about_us->image);
                }
            }

            $imageFile  = $request->file('image');
            $imageName  = $imageFile->getClientOriginalName();

            $imageUpload  = $imageFile->move(public_path() . '/files/about_us/' . $about_us->id, $imageName);

             // Image thumb
            $path = public_path() . '/files/about_us/' . $about_us->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/about_us/' . $about_us->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
        } 

        return SiteAbout::findOrFail($id)->update([
            'en_about' => $request->get('en_about'),
            'ar_about' => $request->get('ar_about'),
            'image' => ($imageName != '') ? $imageName : $about_us->image,
            
        ]);
    }

    public function destroy($id)
    {
        $about_us = AboutUs::findOrFail($id);
               
        // Remove about_us dirctory.
        if(is_dir(public_path() . '/files/about_us/' . $id))
        {
        	chmod(public_path() . '/files/about_us/' . $id, 0777);
        	File::deleteDirectory(public_path() . '/files/about_us/' . $id);
        }

        return AboutUs::destroy($id);

    }

}
