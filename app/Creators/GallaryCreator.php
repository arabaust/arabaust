<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\Gallary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Admailer\Repositories\GallaryRepository;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class GallaryCreator {

    public function store($request){

        $gallary  = Gallary::create($request->all());
        
        //upload Gallart image
        $gallaryImage   = $request->file('image');

        //check if empty = insert default
        if(!empty($gallaryImage))
        {
            $imageName      = $gallaryImage->getClientOriginalName();
            $imageUpload    = $gallaryImage->move(public_path() . '/files/gallary/' . $gallary->id, $imageName);

            // Image thumb
            $path = public_path() . '/files/gallary/' . $gallary->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/gallary/' . $gallary->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            return DB::table('gallary')->where('id', $gallary->id)->update(['image' => $imageName]);}


    }


    public function update($request, $id)
    {
        $imageName = '';
        $gallary = Gallary::findOrFail($id);
        if ($request->hasFile('image')) {

            // Delete old gallary image.
            if(is_dir(public_path() . '/files/gallary/' . $id))
            {
                if(is_file(public_path() . '/files/gallary/' . $id . '/' . $gallary->image))
                {
                    unlink(public_path() . '/files/gallary/' . $id . '/' . $gallary->image);
                }
                if(is_file(public_path() . '/files/gallary/' . $id . '/thumb-' . $gallary->image))
                {
                    unlink(public_path() . '/files/gallary/' . $id . '/thumb-' . $gallary->image);
                }
            }

            $imageFile  = $request->file('image');
            $imageName  = $imageFile->getClientOriginalName();

            $imageUpload  = $imageFile->move(public_path() . '/files/gallary/' . $gallary->id, $imageName);

             // Image thumb
            $path = public_path() . '/files/gallary/' . $gallary->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/gallary/' . $gallary->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            } 
        return Gallary::findOrFail($id)->update([
            'title' => $request->get('title'),
            'url' => $request->get('url'), 
            'image' => ($imageName != '') ? $imageName : $gallary->image,
        ]);
    }

    public function destroy($id)
    {
        $gallary = Gallary::findOrFail($id);         
        // Remove gallary dirctory.
        if(is_dir(public_path() . '/files/gallary/' . $id))
        {
        	chmod(public_path() . '/files/gallary/' . $id, 0777);
        	File::deleteDirectory(public_path() . '/files/gallary/' . $id);
        }

        return Gallary::destroy($id);

    }

}
