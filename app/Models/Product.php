<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Admailer\Models\Clients;
use App;

class Product extends Model
{
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'en_name',
        'en_description',
        'en_meta_title',
        'en_meta_description',
        'ar_name',
        'ar_description',
        'ar_meta_title',
        'ar_meta_description',
        'image',
        'en_model',
        'ar_model',
        'price',
        'quantity',
        'status',
        'manufacturer',
        'categories_id',
        'sku',
        'updated_by',
        'created_by',
        ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
        public static function boot() {
        parent::boot();

        // create a event to happen on updating
        static::updating(function($table)  {
            $table->updated_by = Auth::user()->username;
        });

        // create a event to happen on saving
        static::creating(function($table)  {
          if (Auth::check()){
            $table->created_by = Auth::user()->username;
          }
        });
    }



     public function get_category()
        {
            $this->belongsToMany('Admailer\Models\Catogery','id');


        }


     public static function get_category_name($id)
     {
          $category=Catogery::findOrFail($id);
        if(App::getLocale()=='en')
        {
          $name=$category->en_Name ;
        }
        else
        {
          $name=$category->ar_Name ;
        }


          return  $name;

      }




}
