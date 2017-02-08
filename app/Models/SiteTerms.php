<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SiteTerms extends BaseModel
{
    protected $table = 'site_terms';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['terms'];

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
    }

}
