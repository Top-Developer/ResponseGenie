<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    protected $table = "membership_plans";

    public function club(){

        return $this -> belongsTo('App\Club', 'club_id', 'id');
    }
}
