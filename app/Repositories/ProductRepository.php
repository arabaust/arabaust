<?php

namespace Admailer\Repositories;

use DB;
use Admailer\Models\Product;
use Admailer\Models\Catogery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Excel;
use App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class ProductRepository {

    public $message = [];
    public $finalMessage = [];

    public function all()
    {
        return Product::orderBy('id', 'desc')->get();
    }

    public function get_catgory(){
        
        $Catogery  = Catogery::orderBy('id', 'desc')->where('status','=','1')->get();
      
        return $Catogery;
    }
    
    public function store_excel($excel){

        //upload the sheet
        $current_time = Carbon::now()->toDayDateTimeString();
        $excelName    = $excel->getClientOriginalName();
        $imageUpload  = $excel->move
                       (public_path().'/files/excel/',$excelName);
        $path =  public_path().'/files/excel/'.$excelName ;
        
        //define final message to send it to view    
        $finalMessage = [] ;
        

        //read the sheet
    	Excel::load($path, function ($reader) use ($finalMessage){
        
        $sheet = $reader->getActiveSheet()->toArray();

        foreach (array_slice($sheet, 1) as $key => $row) {
            
            //manual validation
            $validator = Validator::make(
                array(

                    'en_product_name' => $row[0],
                    'ar_product_name' => $row[1],
                    'en_description' => $row[2],
                    'ar_description' => $row[3],
                    'en_meta_tag_title_name' => $row[4],
                    'ar_meta_tag_title_name' => $row[5],
                    'en_meta_tag_title_description  ' => $row[6],
                    'ar_meta_tag_title_description' => $row[7],
                    'en_model' => $row[8],
                    'ar_model' => $row[9],
                    'price' => $row[10],
                    'quantity' => $row[11],
                    'manufacturer' => $row[12],
                    'status' => $row[13],
                    'categories_id'=>$row[14],
                    'SKU' => $row[15],

                ),
                array(

                    'en_product_name'=> 'required',
                    'ar_product_name'=> 'required',
                    'en_description' => 'required',
                    'ar_description' => 'required',
                    'en_meta_tag_title_name'=> 'required',
                    'ar_meta_tag_title_name' => 'required',
                    'en_meta_tag_title_description  '   => 'required',
                    'ar_meta_tag_title_description' => 'required',
                    'en_model' => 'required',
                    'ar_model' => 'required',
                    'price'    => 'required|numeric',
                    'quantity' => 'required|numeric',
                    'manufacturer' => 'required',
                    'status'   => 'required|boolean',
                    'categories_id'=> 'required',
                    'SKU' => 'required',
                    
                )
                
            );

        //validation passed
        if ($validator->passes()){
            
            //decide if update or insert 
            $product = Product::where('SKU', $row[15])->first() ;
            
            //update                  
            if(isset($product->SKU)){

                $product->en_product_name  = $row[0];
                $product->ar_product_name  = $row[1];
                $product->en_description   = $row[2];
                $product->ar_description   = $row[3];
                $product->en_meta_tag_title_name  = $row[4];
                $product->ar_meta_tag_title_name  = $row[5];
                $product->en_meta_tag_title_description  = $row[6];
                $product->ar_meta_tag_title_description  = $row[7];
                $product->en_model  = $row[8];
                $product->ar_model  = $row[9];
                $product->price  = $row[10];
                $product->quantity  = $row[11];
                $product->manufacturer  = $row[12];
                $product->status  = $row[13];
                $product->categories_id  = $row[14];
                $product->SKU  = $row[15];
                $product->updated_by = Auth::user()->username;
                $product->save();


            //insert
            }else{

                $storeProduct                   = new Product();
                $storeProduct->en_product_name  = $row[0];
                $storeProduct->ar_product_name  = $row[1];
                $storeProduct->en_description   = $row[2];
                $storeProduct->ar_description   = $row[3];
                $storeProduct->en_meta_tag_title_name  = $row[4];
                $storeProduct->ar_meta_tag_title_name  = $row[5];
                $storeProduct->en_meta_tag_title_description  = $row[6];
                $storeProduct->ar_meta_tag_title_description  = $row[7];
                $storeProduct->en_model  = $row[8];
                $storeProduct->ar_model  = $row[9];
                $storeProduct->price  = $row[10];
                $storeProduct->quantity  = $row[11];
                $storeProduct->manufacturer  = $row[12];
                $storeProduct->status  = $row[13];
                $storeProduct->categories_id  = $row[14];
                $storeProduct->SKU  = $row[15];
                $storeProduct->created_by = Auth::user()->username;
                $storeProduct->save();

            }
        

        //validation not pass
        }else{

            //parse errors messages
            $errors = $validator->errors();
            $errors =  json_decode($errors); 

            foreach ($errors as $error) {

                //$key += 1 ;
                $message     = 'error in row '.$key;
                array_push($error,$message);
                $orderedArray  = array_reverse($error);
                foreach ($orderedArray as $element) {
                    array_push($this->message,$element);
                }
                

            }
        }
    }

  });

  return Redirect::back()->withErrors($this->message);

 } 




}