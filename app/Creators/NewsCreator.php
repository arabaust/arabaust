<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Admailer\Repositories\NewsRepository;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class NewsCreator {

    public function store($request){
        $news  = News::create($request->all());

        //upload News image
        $newImage 	= $request->file('image');

        //check if empty = insert default
        if(!empty($newImage))
        {
            $imageName 		= $newImage->getClientOriginalName();
            $imageUpload 	= $newImage->move(public_path() . '/files/news/' . $news->id, $imageName);

            // Image thumb
            $path = public_path() . '/files/news/' . $news->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/news/' . $news->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            return DB::table('news')->where('id', $news->id)->update(['image' => $imageName]);}

        else {
              
            }
    }

    public function update($request, $id)
    {
        $imageName = '';
        $news = News::findOrFail($id);
        if ($request->hasFile('image')) {

            // Delete old news image.
            if(is_dir(public_path() . '/files/news/' . $id))
            {
                if(is_file(public_path() . '/files/news/' . $id . '/' . $news->image))
                {
                    unlink(public_path() . '/files/news/' . $id . '/' . $news->image);
                }
                if(is_file(public_path() . '/files/news/' . $id . '/thumb-' . $news->image))
                {
                    unlink(public_path() . '/files/news/' . $id . '/thumb-' . $news->image);
                }
            }

            $imageFile  = $request->file('image');
            $imageName  = $imageFile->getClientOriginalName();

            $imageUpload  = $imageFile->move(public_path() . '/files/news/' . $news->id, $imageName);

             // Image thumb
            $path = public_path() . '/files/news/' . $news->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/news/' . $news->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            } 
        return News::findOrFail($id)->update([
            'news_title' => $request->get('news_title'),
            'description' => $request->get('description'),
            'seo_url' => $request->get('seo_url'),
            'status' => $request->get('status'),
            'publish_date' => $request->get('publish_date'),
            'image' => ($imageName != '') ? $imageName : $news->image,
        ]);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
               
        // Remove news dirctory.
        if(is_dir(public_path() . '/files/news/' . $id))
        {
        	chmod(public_path() . '/files/news/' . $id, 0777);
        	File::deleteDirectory(public_path() . '/files/news/' . $id);
        }

        return News::destroy($id);

    }

}
