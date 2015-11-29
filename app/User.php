<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fname', 'lname', 'email', 'role_id', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the role of the user
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get the users orders
     */
    public function order()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * Get the users address
     */
    public function address()
    {
        return $this->hasMany('App\Address');
    }

    /**
     * Get the users credit cards
     */
    public function creditcard()
    {
        return $this->hasMany('App\CreditCard');
    }

    /**
     * Get the users shifts
     */
    public function shift()
    {
        return $this->belongsToMany('App\Shift', 'user_shifts', 'shift_id', 'user_id')->withPivot('start_time', 'end_time');
    }

    /**
     * Get the activites for the user.
     */
    public function activity()
    {
        return $this->hasMany('App\Activity');
    }
}
