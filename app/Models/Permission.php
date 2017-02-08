<?php namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
  
    protected $table = 'permissions';

    /**
     * roles() many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('Admailer\Models\Role');
    }
}
