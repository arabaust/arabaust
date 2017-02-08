<?php

namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTrack extends Model
{
    protected $table = 'users_track';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['section', 'change', 'user_id', 'file_id', 'file_name'];

    public function chapter(){
        return $this->belongsTo('Admailer\Models\Chapters', 'file_id');
    }

    public function form(){
        return $this->belongsTo('Admailer\Models\Forms', 'file_id');
    }

}
