<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Page extends Model
{

	protected $fillable = [
	  'ar_title',
	  'en_title',
	  'ar_description',
	  'en_description',
	  'ar_meta_data',
	  'en_meta_data',
	  'image',
	  'status',
	  'created_by',
	  'created_at',];
	  

	public static function boot() {
        parent::boot();

        // create a event to happen on updating
        static::updating(function($table)  {
            $table->updated_by = Auth::user()->username;
        });

        // create a event to happen on saving
        static::creating(function($table)  {
            $table->created_by = Auth::user()->username;
        });
    }
	  

    
}
