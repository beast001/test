<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\NewApplicant;
use App\Models\Outcome;
use App\Models\Renewal;
use App\Models\RenewalOutcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRenewApps extends Controller
{
    public function renew_applications()
    {
        $pending_new_applications = NewApplicant::where('status', '=', 'pending')->get()->count();
        $total_new_apps = NewApplicant::all()->count();
        if ($total_new_apps != 0) {
            $new_pending_percentage = round(100 - (($pending_new_applications / $total_new_apps) * 100));
        } else {
            $new_pending_percentage = 0;
        }

        $pending_renewals = Renewal::where('status', '=', 'pending')->get()->count();
        $total_renewals = Renewal::all()->count();
        if ($total_renewals != 0) {
            $renwal_panding_percentage = round(100 - (($pending_renewals / $total_renewals) * 100));
        } else {
            $renwal_panding_percentage = 0;
        }


        $tottal_applications = $total_renewals + $total_new_apps;
        if ($pending_renewals != 0) {
            $completed_percentage = round(100 - ((($pending_new_applications + $pending_renewals) / $tottal_applications) * 100));
        } else {
            $completed_percentage = 0;
        }

        $total_users = User::all()->count();
        $user_id = Auth::user()->id;

        $messages =Message::where('to', '=', $user_id, 'AND', 'status', '=', 'unread')->get();
        $messages_no =Message::where('to', '=', $user_id)->get()->count();

        return view('admin-dashboard', [
            'apps' => $pending_new_applications,
            'renewals' => $pending_renewals,
            'user_total' => $total_users,
            'new_pending_percentage' => $new_pending_percentage,
            'renwal_panding_percentage' => $renwal_panding_percentage,
            'tottal_applications' => $tottal_applications,
            'completed_percentage' => $completed_percentage,
            'messages'=>$messages,
            'message_no'=>$messages_no]);;
    }

    public function view_application($id)
    {
        $info_data = Renewal::where('id', '=', $id)->first();

        return view('admin-renew-view', ['info_data' => $info_data]);
    }

    public function approve(Request $request)
    {

        $currentuserid = Auth::user()->id;


        $request->validate([
            'info' => 'required',
        ]);

        $application_id = $request->input('application_id');
        $application_exists_no = RenewalOutcome::where('application_id', '=', $application_id)->get()->count();


//        if there is no other application in the outcome table with the same id issue cert

        if ($application_exists_no <= 0) {

            DB::update('update renewals set status = ? where id = ?', ['approved', $application_id]);


            Message::create([
                'from' => Auth::user()->id,
                'to' => $request->input('user_id'),
                'message' => $request->input('info'),

            ]);

            $cert = str_pad($application_id, 6, "0", STR_PAD_LEFT);

            RenewalOutcome::create([
                'application_id' => $request->input('application_id'),
                'action_by' => $currentuserid,
                'status' => 'approved',
                'info' => $request->input('info'),
                'cert' => $cert,

            ]);


            session(['meso' => 'Application Approved Successfully']);
            return redirect('/clearance_cert');

        } else {
            session(['duplicate' => 'Application Approved Successfully']);
            return redirect('/dashboard_renew_apps_id_' . $application_id);
        }


    }


    public function reject(Request $request)
    {
        $currentuserid = Auth::user()->id;

        $request->validate([
            'info' => 'required',
        ]);
        $application_id = $request->input('application_id');
        $application_exists_no = RenewalOutcome::where('application_id', '=', $application_id)->get()->count();


//        if there is no other application in the outcome table with the same id issue cert

        if ($application_exists_no <= 0) {


            DB::update('update renewals set status = ? where id = ?', ['rejected', $application_id]);


            Message::create([
                'from' => Auth::user()->id,
                'to' => $request->input('user_id'),
                'message' => $request->input('info'),

            ]);


            RenewalOutcome::create([
                'application_id' => $request->input('application_id'),
                'action_by' => $currentuserid,
                'status' => 'rejected',
                'info' => $request->input('info'),

            ]);


            session(['meso' => 'Application Rejected Successfully']);
            return redirect('/dashboard_new_apps');

        } else {
            session(['duplicate' => 'Application Approved Successfully']);
            return redirect('/dashboard_renew_apps_id_' . $application_id);
        }

    }
}
