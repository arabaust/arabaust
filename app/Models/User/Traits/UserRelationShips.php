<?php namespace Admailer\Models\User\Traits;

trait UserRelationShips {

    /**
     * role() one-to-one relationship method
     *
     * @return QueryBuilder
     */
    public function role()
    {
        return $this->belongsTo('Admailer\Models\Role');
    }

    public function organisation()
    {
        return $this->belongsTo('Admailer\Models\Organisation');
    }
}