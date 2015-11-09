<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The ingredients of the products
     */
    public function product()
    {
        return $this->belongsToMany('App\Product', 'recipes')->withPivot('id', 'quantity');
    }
}
