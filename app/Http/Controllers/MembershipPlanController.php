<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\MembershipPlan;

class MembershipPlanController extends Controller{

    public function createMembershipPlan(Request $request){

        $mPlan = new MembershipPlan;

        if( $request -> pName != '' ){
            $mPlan -> name = $request -> pName;
            if( $request -> pDesc != '' ){
                $mPlan -> description = $request -> pDesc;
                if( $request -> pDura != '' ){
                    $mPlan -> duration_quantity = $request -> pDura;
                    if( $request -> pDuraUnit != '' ){
                        $mPlan -> duration_unit = $request -> pDuraUnit;
                        if( $request -> pCost != '' ){
                            $mPlan -> cost = $request -> pCost;
                            if( $request -> pMO != '' ){
                                $plan_isMemberOnly = 'true';
                            }else{
                                $plan_isMemberOnly = 'false';
                            }
                            $mPlan -> is_for_members_only = $plan_isMemberOnly;
                            $mPlan -> club_id = Session::get('theClubID');
                            $mPlan -> save();
                            return back()
                                -> with('active_tab', $request -> active_tab);
                        }else
                            return back()
                                -> with('active_tab', $request -> active_tab)
                                -> with('plan_msg', 'plan cost missed');
                    }else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('plan_msg', 'plan duration unit missed');
                }else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'plan duration missed');
            }else
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'plan description missed');
        }else{
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'plan name missed');
        }
    }

    public function updateMembershipPlan(Request $request){

        if ($request->pId != '') {

            $mPlan = MembershipPlan::find($request->pId);

            if( $request -> pName != '' ){
                $mPlan -> name = $request -> pName;
                if( $request -> pDesc != '' ){
                    $mPlan -> description = $request -> pDesc;
                    if( $request -> pDura != '' ){
                        $mPlan -> duration_quantity = $request -> pDura;
                        if( $request -> pDuraUnit != '' ){
                            $mPlan -> duration_unit = $request -> pDuraUnit;
                            if( $request -> pCost != '' ){
                                $mPlan -> cost = $request -> pCost;
                                if( $request -> pMO != '' ){
                                    $plan_isMemberOnly = 'true';
                                }else{
                                    $plan_isMemberOnly = 'false';
                                }
                                $mPlan -> is_for_members_only = $plan_isMemberOnly;
                                $mPlan -> club_id = Session::get('theClubID');
                                $mPlan -> save();
                                return back()
                                    -> with('active_tab', $request -> active_tab);
                            }else
                                return back()
                                    -> with('active_tab', $request -> active_tab)
                                    -> with('plan_msg', 'plan cost missed');
                        }else
                            return back()
                                -> with('active_tab', $request -> active_tab)
                                -> with('plan_msg', 'plan duration unit missed');
                    }else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('plan_msg', 'plan duration missed');
                }else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('plan_msg', 'plan description missed');
            }else{
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('plan_msg', 'plan name missed');
            }

        } else
            return back()
                -> with('active_tab', $request -> active_tab)
                -> with('plan_msg', 'unexpected exception with plan ID');
    }
}
