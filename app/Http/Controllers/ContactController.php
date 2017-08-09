<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Club;
use App\Event;

class ContactController extends Controller{

    public function updateEventContact(Request $request){

        $contact = Contact::find(Event::find(session('eventId')) -> contact_id);

        if( '' != $request -> use_club ){
            $clubContact = Contact::find(Club::find(Event::find(session('eventId')) -> club_id));
            $contact -> city = $clubContact -> city;
            $contact -> state = $clubContact -> state;
            $contact -> zipcode = $clubContact -> zipcode;
            $contact -> pcm_id = $clubContact -> pcmid;
            $contact -> scm_id = $clubContact -> scmid;
            $contact -> linkedin = $clubContact -> inLink;
            $contact -> level_in = $clubContact -> inLevel;
            $contact -> twitter = $clubContact -> ttLink;
            $contact -> level_t = $clubContact -> ttLevel;
            $contact -> facebook = $clubContact -> fbLink;
            $contact -> level_f = $clubContact -> fbLevel;
            $contact -> youtube = $clubContact -> ytLink;
            $contact -> level_y = $clubContact -> ytLevel;
            $contact -> googleplus = $clubContact -> goLink;
            $contact -> level_g = $clubContact -> goLevel;
            $contact -> mail = $clubContact -> maLink;
            $contact -> level_m = $clubContact -> maLevel;
        }
        else{
            $contact -> city = $request -> city;
            $contact -> state = $request -> state;
            $contact -> zipcode = $request -> zipcode;
            $contact -> pcm_id = $request -> pcmid;
            $contact -> scm_id = $request -> scmid;
            $contact -> linkedin = $request -> inLink;
            $contact -> level_in = $request -> inLevel;
            $contact -> twitter = $request -> ttLink;
            $contact -> level_t = $request -> ttLevel;
            $contact -> facebook = $request -> fbLink;
            $contact -> level_f = $request -> fbLevel;
            $contact -> youtube = $request -> ytLink;
            $contact -> level_y = $request -> ytLevel;
            $contact -> googleplus = $request -> goLink;
            $contact -> level_g = $request -> goLevel;
            $contact -> mail = $request -> maLink;
            $contact -> level_m = $request -> maLevel;
        }

        $contact -> save();

        return back()
            -> with('active_tab', $request -> active_tab);
    }

    public function updateClubContact(Request $request)
    {
        $contact = Contact::find(Club::find(session('theClubID')) -> contact_id);

        $contact -> city = $request -> city;
        $contact -> state = $request -> state;
        $contact -> zipcode = $request -> zipcode;
        $contact -> pcm_id = $request -> pcmid;
        $contact -> scm_id = $request -> scmid;
        $contact -> linkedin = $request -> inLink;
        $contact -> level_in = $request -> inLevel;
        $contact -> twitter = $request -> ttLink;
        $contact -> level_t = $request -> ttLevel;
        $contact -> facebook = $request -> fbLink;
        $contact -> level_f = $request -> fbLevel;
        $contact -> youtube = $request -> ytLink;
        $contact -> level_y = $request -> ytLevel;
        $contact -> googleplus = $request -> goLink;
        $contact -> level_g = $request -> goLevel;
        $contact -> mail = $request -> maLink;
        $contact -> level_m = $request -> maLevel;

        $contact -> save();

        return back()
            -> with('active_tab', $request -> active_tab);
    }
}
