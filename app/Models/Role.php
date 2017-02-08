<?php namespace Admailer\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * users() one-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function users()
    {
        return $this->hasMany('Admailer\Models\User');
    }

    /**
     * permissions() many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->belongsToMany('Admailer\Models\Permission');
    }

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