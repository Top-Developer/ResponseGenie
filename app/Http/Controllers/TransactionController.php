<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Club;
use App\EventMember;
use App\EventPrice;
use App\MembershipPlan;
use App\TransactionForPlan;
use App\User;

class TransactionController extends Controller{

    public function createTransaction(Request $request){

        if($request -> has('stripeToken')){
            \Stripe\Stripe::setApiKey(Session::get('stripe_secret_key'));

            $token = $request -> stripeToken;

            $charge = \Stripe\Charge::create(array(
                "amount" => 100 * EventPrice::find($request -> ePrice_id) -> cost,
                "currency" => "usd",
                "description" => "Example charge",
                "source" => $token,
            ));

            if($charge -> paid == true){
                $newEventMember = new EventMember;
                $newEventMember -> user_id = Auth::id();
                $newEventMember -> club_id = EventMember::find($request -> plan_id) -> club_id;
                $newEventMember -> role_id = 4;
                $newEventMember -> save();
                return back();
            }else{
                return back() -> with('msg', 'payment failed');
            }
        }else{
            if( 0 == MembershipPlan::find($request->plan_id)->cost){
                return redirect('/clubs/'.Club::find(MembershipPlan::find($request->plan_id)->club_id)->slug);
            }
        }
    }

    public function insertManualTransactions(Request $request){

        $applyTo = $request -> applyTo;
        if( substr($applyTo,0, 16) == 'MembershipPlan:' ){
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
        }
    }

}
