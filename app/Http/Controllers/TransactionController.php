<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Club;
use App\Event;
use App\EventMember;
use App\EventPrice;
use App\MembershipPlan;
use App\TransactionForPlan;
use App\TransactionForEvent;
use App\User;

class TransactionController extends Controller{

    public function createTransactionForEvent($slug, Request $request){

        if($request -> has('stripeToken')){
            \Stripe\Stripe::setApiKey(Session::get('stripe_secret_key'));

            $token = $request -> stripeToken;

            $charge = \Stripe\Charge::create(array(
                "amount" => 100 * EventPrice::find($request->ePrice_id)->cost,
                "currency" => "usd",
                "description" => "Example charge",
                "source" => $token,
            ));

            if($charge->paid == true){
                $transaction = new TransactionForEvent;
                $transaction->user_id = Auth::id();
                $transaction->event_price_id = $request->ePrice_id;
                $transaction->amount = EventPrice::find($request->ePrice_id) -> cost;
                $transaction->source = Auth::id();
                $transaction->date = date('Y-m-d');
                $transaction->receipt = -1;
                $transaction->save();

                $newEventMember = new EventMember;
                $newEventMember->user_id = Auth::id();
                $newEventMember->event_id = Event::where('slug', $slug)
                    ->select('id')
                    ->first()
                    ->id;
                $newEventMember->invited = 0;
                $newEventMember->save();
                return redirect('/events/'.$slug);
            }else{
                return back() -> with('msg', 'payment failed');
            }
        }else{
            if( 0 == MembershipPlan::find($request->plan_id)->cost ){
                $newEventMember = new EventMember;
                $newEventMember->user_id = Auth::id();
                $newEventMember->event_id = Event::where('slug', $slug)
                    ->select('id')
                    ->first()
                    ->id;;
                $newEventMember->invited = 0;
                $newEventMember->save();

                return redirect('/events/'.$slug);
            }
        }
    }

    public function insertManualTransactions(Request $request){

        $applyTo = $request -> applyTo;
        if( substr($applyTo,0, 16) == 'membership_plan:' ){
            $plan_id = (int)substr($applyTo,16);
            $user = $request -> user;
            if( substr($user,0, 7) == 'online:' ){
                $user_id = (int)substr($user, 7);
                $transForPlan = new TransactionForPlan;
                $transForPlan -> user_id = $user_id;
                $transForPlan -> plan_id = $plan_id;
                $transForPlan -> amount = $request -> mt_amount;
                $transForPlan -> source = 'cash';
                $transForPlan -> date = date("Y-m-d");
                $receipt_id = Auth::id();
                $receipt = User::find($receipt_id);
                $transForPlan -> receipt = $receipt -> first_name.' '.$receipt -> last_name;
                $transForPlan -> save();
            }
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('msg', 'manual transaction input for membership plan succeed');
        }
        else if( substr($applyTo,0, 12) == 'event_price:' ){
            $price_id = (int)substr($applyTo,12);
            $user_id = (int)($request->user);
            $transForEvent = new TransactionForEvent;
            $transForEvent -> user_id = $user_id;
            $transForEvent -> event_price_id = $price_id;
            $transForEvent -> amount = $request -> mt_amount;
            $transForEvent -> source = 'cash';
            $transForEvent -> date = date("Y-m-d");
            $receipt_id = Auth::id();
            $receipt = User::find($receipt_id);
            $transForEvent -> receipt = $receipt -> first_name.' '.$receipt -> last_name;
            $transForEvent -> save();
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('msg', 'manual transaction input for club event succeed');
        }else{
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('msg', 'manual transaction input failed');
        }
    }

    public function createTransactionForMembership($request){

        if($request -> has('stripeToken')){
            \Stripe\Stripe::setApiKey(Session::get('stripe_secret_key'));

            $token = $request -> stripeToken;

            $charge = \Stripe\Charge::create(array(
                "amount" => 100 * MembershipPlan::find($request -> plan_id) -> cost,
                "currency" => "usd",
                "description" => "Example charge",
                "source" => $token,
            ));

            if($charge -> paid == true){

                $newMembership = new Online_member;
                $newMembership -> user_id = Auth::id();
                $newMembership -> membership_plan_id = $request -> plan_id;
                $newMembership -> join_date = date('Y-m-d');
                $duraUnit = MembershipPlan::find($request -> plan_id) -> duration_unit;
                if( $duraUnit == 'Day(s)' ){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.MembershipPlan::find($request -> plan_id) -> duration_quantity).' days');
                }
                else if($duraUnit == 'Month(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else if($duraUnit == 'Quater(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(3 * MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else{}

                $newMembership->save();

                return redirect('/clubs/'.Club::find( MembershipPlan::find($request -> plan_id) -> club_id) -> slug);
            }
            else{
                return back() -> with('msg', 'payment failed');
            }
        }
        else{
            if( 0 == MembershipPlan::find($request -> plan_id) -> cost ){

                $newMembership = new Online_member;
                $newMembership -> user_id = Auth::id();
                $newMembership -> membership_plan_id = $request -> plan_id;
                $newMembership -> join_date = date('Y-m-d');
                $duraUnit = MembershipPlan::find($request -> plan_id) -> duration_unit;
                if( $duraUnit == 'Day(s)' ){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(MembershipPlan::find($request -> plan_id) -> duration_quantity).' days'));
                }
                else if($duraUnit == 'Month(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else if($duraUnit == 'Quater(s)'){
                    $newMembership -> expiration_date = date('Y-m-d', strtotime('+'.(string)(3 * MembershipPlan::find($request -> plan_id) -> duration_quantity).' Months'));
                }
                else{}

                $newMembership -> save();

                return $this -> clubManagement(Club::find( MembershipPlan::find($request -> plan_id) -> club_id) -> slug);
            }
        }
    }
}
