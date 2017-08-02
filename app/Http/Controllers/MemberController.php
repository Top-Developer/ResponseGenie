<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

use App\Offline_member;

class MemberController extends Controller{

    public function import(Request $request){

        if( $request -> has('m_name_first') ){
            $fname = $request -> input('m_name_first');
            if( $request -> has('m_name_last') ){
                $lname = $request -> input('m_name_last');
                if( $request -> has('m_email') ){
                    $eMail = $request -> input('m_email');
                    if( $request -> has('m_join_date') ){
                        $jDate = $request -> input('m_join_date');
                        if( $request -> has('m_exp_date') ){
                            $eDate = $request -> input('m_exp_date');
                            $oMember = new Offline_member;
                            $oMember -> f_name = $fname;
                            $oMember -> l_name = $lname;
                            $oMember -> email = $eMail;
                            $oMember -> joinDate = $jDate;
                            $oMember -> expDate = $eDate;
                            $oMember -> claimer_id = Auth::id();
                            $oMember -> club_id = Session::get('theClubID');
                            $oMember -> save();
                        }
                        else
                            return back()
                                -> with('active_tab', $request -> active_tab)
                                -> with('members_msg', 'expiration date missed');
                    }
                    else
                        return back()
                            -> with('active_tab', $request -> active_tab)
                            -> with('members_msg', 'joined date missed');
                }
                else
                    return back()
                        -> with('active_tab', $request -> active_tab)
                        -> with('members_msg', 'email missed');
            }
            else
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('members_msg', 'member last name missed');
        }
        else{
            if( $request -> hasFile('csv_files') ){
                $this -> validate($request, [
                    'csv_files' => 'mimes:csv,txt',]);

                $csvName = time().'.'.$request -> csv_files -> getClientOriginalExtension();
                $request -> file('csv_files') -> move(public_path('uploads/csvs'), $csvName);

                $file = fopen('uploads/csvs/'.$csvName, "r");
                while ( ($data = fgetcsv($file)) !==FALSE ){

                    $no = $data[0];
                    if($no == 'No'){
                        continue;
                    }
                    else{
                        $oMember = new Offline_member;
                        $oMember -> fname = $data[1];
                        $oMember -> lname = $data[2];
                        $oMember -> email = $data[3];
                        $oMember -> joinDate = date('Y-m-d H:i:s', date_create_from_format('m/d/Y:H:i:s', $data[4].':00:00:00') -> getTimestamp());
                        $oMember -> expDate = date('Y-m-d H:i:s', date_create_from_format('m/d/Y:H:i:s', $data[5].':00:00:00') -> getTimestamp());
                        $oMember -> claimer_id = Auth::id();
                        $oMember -> club_id = Session::get('theClubID');
                        //$oMember -> MembershipPlan_id = $data[6];
                        $oMember -> save();
                    }
                }
                fclose($file);
            }
            else{
                return back()
                    -> with('active_tab', $request -> active_tab)
                    -> with('members_msg', 'no input data');
            }
        }
    }

}
