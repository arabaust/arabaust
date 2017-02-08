<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Admailer\Models\Clients;


class News extends Model
{
    protected $table = 'news';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ar_title',
        'ar_description',
        'en_title',
        'en_description',
        'seo_url',
        'image',
        'status',
        'publish_date',
        'created_by',
        'updated_by',

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
}