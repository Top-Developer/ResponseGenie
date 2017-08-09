<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Event;
use App\EventMember;

class EventMemberController extends Controller
{
    public function acceptInvitation($slug){
        $event_id = Event::where('slug', $slug)->first()->id;
        $record = EventMember::where('event_id', $event_id)->where('user_id', Auth::id())->first();
        $record->invited = 0;
        $record->save();
        return redirect('events/'.$slug);
    }
}
