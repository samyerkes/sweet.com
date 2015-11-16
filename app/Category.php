<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the products for the category
     */
    public function product()
    {
        return $this->hasMany('App\Product', 'category_id');
    }
}
