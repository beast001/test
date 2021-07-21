<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\NewApplicant;
use App\Models\Renewal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function dashboard(){
        $pending_new_applications =NewApplicant::where('status', '=', 'pending')->get()->count();
        $total_new_apps = NewApplicant::all()->count();
        if ($total_new_apps!=0) {
            $new_pending_percentage = round(100 - (($pending_new_applications / $total_new_apps) * 100));
        }else{
            $new_pending_percentage = 0;
        }

        $pending_renewals =Renewal::where('status', '=', 'pending')->get()->count();
        $total_renewals = Renewal::all()->count();
        if ($total_renewals!=0){
            $renwal_panding_percentage =round(100-(($pending_renewals/$total_renewals)*100));
        }else{
            $renwal_panding_percentage=0;
        }



        $tottal_applications = $total_renewals + $total_new_apps;
        if($pending_renewals!=0) {
            $completed_percentage = round(100 - ((($pending_new_applications + $pending_renewals) / $tottal_applications) * 100));
        }else{
            $completed_percentage = 0;
        }

        $total_users = User::all()->count();
        $user_id = Auth::user()->id;

        $messages =Message::where('to', '=', $user_id, 'AND', 'status', '=', 'unread')->get();
        $messages_no =Message::where('to', '=', $user_id)->get()->count();

        return view('admin-dashboard',[
            'apps'=>$pending_new_applications ,
            'renewals'=>$pending_renewals,
            'user_total'=>$total_users,
            'new_pending_percentage'=>$new_pending_percentage,
            'renwal_panding_percentage'=>$renwal_panding_percentage,
            'tottal_applications'=>$tottal_applications,
            'completed_percentage'=>$completed_percentage,
            'messages'=>$messages,
            'message_no'=>$messages_no]);
    }
}
