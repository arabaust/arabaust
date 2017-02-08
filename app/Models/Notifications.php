<?php

namespace Admailer\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Notifications extends BaseModel
{
    protected $table = 'notifications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'sent_on'
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
        static::saving(function($table)  {
            $table->created_by = Auth::user()->username;
        });
    }

    // public function user() {
    //     return $this->belongsTo('Admailer\Models\User');
    // }

    public function role() {
        return $this->belongsToMany('Admailer\Models\RoleClients');
    }

    /**
     *
     * The function return notification where user_id.
     *
    */
    public static function notifications()
    {
        return Notifications::select('name', 'description')->where(['created_by' => Auth::id(), 'status' => '0'])->get();
    }

}
