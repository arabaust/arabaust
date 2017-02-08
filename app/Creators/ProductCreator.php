<?php

namespace Admailer\Creators;

use Carbon\Carbon;
use Admailer\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class ProductCreator {

    public function store($request){
        $products  = Product::create($request->all());
        
        //upload product image
        $productImage 	= $request->file('image');

        //check if empty = insert default
        if(!empty($productImage))
        {
            $imageName 		= $productImage->getClientOriginalName();
            $imageUpload 	= $productImage->move(public_path() . '/files/products/' . $products->id, $imageName);

            // Image thumb
            $path = public_path() . '/files/products/' . $products->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/products/' . $products->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            return DB::table('products')->where('id', $products->id)->update(['image' => $imageName]);}

        else {
               // $imageName = "thumb-default.png";
               // if(!is_dir(public_path() . '/files/products/' . $products->id))
               // {
               //      $image_dir = mkdir(public_path() . '/files/products/' . $products->id, 0777);
               // }
               // $old_path = public_path(). '/files/default.png';
               // $new_path = public_path() . '/files/products/' . $products->id . '/' . $imageName;
               // $move = File::copy($old_path, $new_path);
               // return DB::table('products')->where('id', $products->id)->update(['image' => $imageName]);
            }
    }

    public function update($request, $id)
    {
        $imageName = '';
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {

            // Delete old product image.
            if(is_dir(public_path() . '/files/products/' . $id))
            {
                if(is_file(public_path() . '/files/products/' . $id . '/' . $product->image))
                {
                    unlink(public_path() . '/files/products/' . $id . '/' . $product->image);
                }
                if(is_file(public_path() . '/files/products/' . $id . '/thumb-' . $product->image))
                {
                    unlink(public_path() . '/files/products/' . $id . '/thumb-' . $product->image);
                }
            }

            $imageFile  = $request->file('image');
            $imageName  = $imageFile->getClientOriginalName();

            $imageUpload  = $imageFile->move(public_path() . '/files/products/' . $product->id, $imageName);

             // Image thumb
            $path = public_path() . '/files/products/' . $product->id . '/' . $imageName;
            $path_thumb = public_path() . '/files/products/' . $product->id . '/thumb-' . $imageName;
            $image =  Image::make($path)->resize(200, 200)->save($path_thumb);
            } 
        return Product::findOrFail($id)->update([
            'en_name' => $request->get('en_name'),
            'en_description' => $request->get('en_description'),
            'en_meta_title' => $request->get('en_meta_title'),
            'en_meta_description' => $request->get('en_meta_description'),
            'ar_name' => $request->get('ar_name'),
            'ar_description' => $request->get('ar_description'),
            'ar_meta_title' => $request->get('ar_meta_title'),
            'ar_meta_description' => $request->get('ar_meta_description'),
            'en_model' => $request->get('en_model'),
            'ar_model' => $request->get('ar_model'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'status' => $request->get('status'),
            'manufacturer' => $request->get('manufacturer'),
            'categories_id' => $request->get('categories_id'),
            'sku' => $request->get('sku'),
            'image' => ($imageName != '') ? $imageName : $product->image,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
               
        // Remove product dirctory.
        if(is_dir(public_path() . '/files/products/' . $id))
        {
        	chmod(public_path() . '/files/products/' . $id, 0777);
        	File::deleteDirectory(public_path() . '/files/products/' . $id);
        }

        return Product::destroy($id);

    }

}
