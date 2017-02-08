<?php 

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SiteSettings extends BaseModel {

    protected $table = 'site_settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'email',
		'notification_email',
		'phone_1',
		'fax',
		'physical_address',
		'mailing_address',
		'country',
		'city',
		'zip_code',
		'phone_2'
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
    }
}