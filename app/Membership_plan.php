<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership_plan extends Model
{
    protected $table = "membership_plans";

    public function club(){

        return $this -> belongsTo('App\Club', 'club_id', 'id');
    }
}
