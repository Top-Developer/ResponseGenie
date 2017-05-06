<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    public function club(){

        return $this -> belongsTo('App\Club', 'club_id', 'id');
    }
}
