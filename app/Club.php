<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';

    public function users()
    {
        return $this -> belongsToMany('App\User', 'roleships', 'club_id', 'user_id');
    }

    public function contact(){

        return $this -> hasOne('App\Contact', 'club_id', 'id');
    }
}
