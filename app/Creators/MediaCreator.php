<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Admailer\Repositories\MediaRepository;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class MediaCreator {

    public function store($request){

        $media=Media::create($request->all());

    }


    public function update($request, $id)
    {
        $imageName = '';
        $media = Media::findOrFail($id);
        if ($request->hasFile('image')) {

            // Delete old media image.
            if(is_dir(public_path() . '/files/media/' . $id))
            {
                if(is_file(public_path() . '/files/media/' . $id . '/' . $media->image))
                {
                    unlink(public_path() . '/files/media/' . $id . '/' . $media->image);
                }
                if(is_file(public_path() . '/files/media/' . $id . '/thumb-' . $media->image))
                {
                    unlink(public_path() . '/files/media/' . $id . '/thumb-' . $media->image);
                }
            }

            $imageFile  = $request->file('image');
            $imageName  = $imageFile->getClientOriginalName();

            $imageUpload  = $imageFile->move(public_path() . '/files/media/' . $media->id, $imageName);

             // Image thumb
            $path = public_path() . '/files/media/' . $media->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/media/' . $media->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            } 
        return Media::findOrFail($id)->update([
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'status' => $request->get('status'),
            'image' => ($imageName != '') ? $imageName : $media->image,
        ]);
    }

    public function destroy($id)
    {
        // dd($id);
        $media = Media::findOrFail($id);         
        // Remove media dirctory.
        if(is_dir(public_path() . '/files/media/' . $id))
        {
        	chmod(public_path() . '/files/media/' . $id, 0777);
        	File::deleteDirectory(public_path() . '/files/media/' . $id);
        }

        return Media::destroy($id);

    }

}
