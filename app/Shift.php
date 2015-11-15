<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /**
     * The shift can have many users
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_shifts', 'shift_id', 'user_id')->withPivot('id', 'start_time', 'end_time');
    }
}
