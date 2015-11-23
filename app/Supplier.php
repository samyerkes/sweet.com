<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
     * Get the users for the role.
     */
    public function ingredient()
    {
        return $this->hasMany('App\Ingredient');
    }
}
