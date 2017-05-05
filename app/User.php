<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address', 'city', 'state', 'email','zip', 'phone', 'password', 'provider', 'provider_id', 'email_validation', 'is_admin', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clubs()
    {
        return $this -> belongsToMany('App\Club', 'roleships', 'user_id', 'club_id');
    }
}
