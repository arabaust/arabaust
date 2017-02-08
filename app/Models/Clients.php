<?php

namespace Admailer\Models;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Admailer\Models\Occasions;
use Admailer\Models\Emergency;


class Clients extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'last_name',
        'first_name',
        'status',
        'mobile',
        'address',
        'country',
        'date_of_birth',
        'gender',
        'token',
        'device_token',
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
            $table->updated_by = Auth::user()->username;
          }
        });

        // create a event to happen on saving
        static::creating(function($table)  {
          if (Auth::check()){
            $table->created_by = Auth::user()->username;
          }
        });
    }

    public function setDOBAttribute($value)
    {
       $this->attributes['date_of_birth'] = Carbon::createFromFormat('Y-m-d', $value);
    }

    /**
     * emergency() many-to-one relationship method
     *
     * @return QueryBuilder
     */
    public function emergency()
    {
        return $this->hasMany('Admailer\Models\Emergency', 'client_id');
    }


    /**
     * occasion() many-to-one relationship method
     *
     * @return QueryBuilder
     */
    public function occasion()
    {
        return $this->hasMany('Admailer\Models\Occasions', 'client_id');
    }


}
