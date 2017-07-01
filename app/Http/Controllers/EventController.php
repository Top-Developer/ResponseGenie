<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller{

    public function getEventDates(Request $request){
        //echo 'here';
        $eventDate = json_encode(array(
            array(
                'title'=>'test',
                'start'=>'2017-07-02T12:00:00',
                'end'=>'2017-07-03T13:00:00'
            )
        ));
        echo $eventDate;
    }

}
