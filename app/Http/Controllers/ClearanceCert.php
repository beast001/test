<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Outcome;
use App\Models\Renewal;
use App\Models\RenewalOutcome;
use App\Models\User;
use App\Models\NewApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearanceCert extends Controller
{

    public function print()
    {
        return view('print-cert');
    }


//USER SIDE RENEW CERT PAGE
    public function renewal_cert($id)
    {
        $user_id = Renewal::where('id', '=',$id)->pluck('user_id');
        $user_data = User::where('id','=', $user_id)->get()->first();
        $outcome = RenewalOutcome::where('application_id','=',$id)->get()->first();
        $outcome_no = RenewalOutcome::where('application_id','=',$id)->count();

        return view('new_certificate', [
            'user_data'=>$user_data,
            'outcome_no'=>$outcome_no,
            'outcome'=>$outcome,
            'status'=>'Renewal Application',

        ]);
    }

    //USER SIDE NEW CERT PAGE
    public function new_cert($id)
    {
        $user_id = NewApplicant::where('id', '=',$id)->pluck('user_id');
        $user_data = User::where('id','=', $user_id)->get()->first();
        $outcome = Outcome::where('application_id','=',$id)->get()->first();
        $outcome_no = Outcome::where('application_id','=',$id)->count();


        return view('new_certificate', [
            'user_data'=>$user_data,
            'outcome_no'=>$outcome_no,
            'outcome'=>$outcome,
            'status'=>'New Application',


        ]);
    }

    public function print_new($id){
        $user_id = NewApplicant::where('id', '=',$id)->pluck('user_id');
        $user_data = User::where('id','=', $user_id)->get()->first();
        $outcome = Outcome::where('application_id','=',$id)->get()->first();
        $outcome_no = Outcome::where('application_id','=',$id)->count();


        return view('print-cert', [
            'user_data'=>$user_data,
            'outcome_no'=>$outcome_no,
            'outcome'=>$outcome,
            'status'=>'New Application',


        ]);
    }

    public function print_renew($id){
        $user_id = Renewal::where('id', '=',$id)->pluck('user_id');
        $user_data = User::where('id','=', $user_id)->get()->first();
        $outcome = RenewalOutcome::where('application_id','=',$id)->get()->first();
        $outcome_no = RenewalOutcome::where('application_id','=',$id)->count();


        return view('print-cert', [
            'user_data'=>$user_data,
            'outcome_no'=>$outcome_no,
            'outcome'=>$outcome,
            'status'=>'Renew Application',


        ]);
    }
}
