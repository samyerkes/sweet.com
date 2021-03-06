<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	
    /**
     * Get the owner of the address
     */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
}
