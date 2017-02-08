<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Admailer\Models\Clients;


class AboutUs extends BaseModel
{
    protected $table = 'about_us';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
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
            if (Auth::check()){
            }
        });

        // create a event to happen on saving
        static::creating(function($table)  {
          if (Auth::check()){
          }
        });
    }


}
