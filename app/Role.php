<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the users for the role.
     */
    public function user()
    {
        return $this->hasMany('App\User', 'role', 'id');
    }
}
