<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\EventPrice;

class PriceController extends Controller{

    public function createPrice(Request $request){

        $ePrice = new EventPrice;

        if( $request -> pName != '' ){
            $ePrice -> name = $request -> pName;
            if( $request -> pDesc != '' ){
                $ePrice -> description = $request -> pDesc;
                if( $request -> pCost != '' ){
                    $ePrice -> cost = $request -> pCost;
                    if( $request -> pMO != '' ){
                        $price_isMemberOnly = 1;
                    }else{
                        $price_isMemberOnly = 0;
                    }
                    $ePrice -> members_only = $price_isMemberOnly;
                    $ePrice -> event_id = Session::get('eventId');
                    $ePrice -> timestamps = false;
                    $ePrice -> save();
                    return back()
                        -> with('active_tab', $request -> active_tab);
                }else{
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'price cost missed');}
            }else
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'price description missed');
        }else{
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'price name missed');
        }
    }

    public function updatePrice(Request $request){

        if ($request->price_id != '') {

            $ePrice = EventPrice::find($request->price_id);

            if( $request -> pName != '' ){
                $ePrice -> name = $request -> pName;
                if( $request -> pDesc != '' ){
                    $ePrice -> description = $request -> pDesc;
                    if( $request -> pCost != '' ){
                        $ePrice -> cost = $request -> pCost;
                        if( $request -> pMO != '' ){
                            $plan_isMemberOnly = 1;
                        }else{
                            $plan_isMemberOnly = 0;
                        }
                        $ePrice -> members_only = $plan_isMemberOnly;
                        $ePrice -> timestamps = false;
                        $ePrice -> save();
                        return back()
                            -> with('active_tab', $request -> active_tab);
                    }else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('plan_msg', 'price cost missed');
                }else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'price description missed');
            }else{
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'price name missed');
            }

        } else
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'unexpected exception with price ID');
    }
}
