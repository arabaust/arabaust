<?php namespace Admailer\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model 
{
	protected $table = "permission_role";

    /**
     * roles() many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function roles()
    {
        return $this->belongsToMany('Admailer\Models\Role');
    }

    /**
     * permissions() many-to-many relationship method
     *
     * @return QueryBuilder
     */
    public function permissions()
    {
        return $this->belongsToMany('Admailer\Models\Permission', 'id');
        
    }
}