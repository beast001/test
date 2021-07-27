<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Renewal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenewalApplicant extends Controller
{
    public function renewal_applicant(){
        $user_id = Auth::user()->id;

        $messages =Message::where('to', '=', $user_id, 'AND', 'status', '=', 'unread')->get();
        $messages_no =Message::where('to', '=', $user_id)->get()->count();
        return view('renewal-applicant',[
            'messages'=>$messages,
            'messages_no'=>$messages_no,
        ]);
    }
    public function renewal_submit(Request $request){
        //validation rules
        $request->validate([
            'name'=> 'required',
            'nationality'=> 'required',
            'passport_no'=> 'required',
            'company'=> 'required',
            'gender'=>'required',
            'passport_pic'=> 'required|mimes:pdf|max:10000',

            'current_permit' => 'required|mimes:pdf|max:10000',
            'understudy_cv' => 'required|mimes:pdf|max:10000',
            'takeover_evidence' => 'required|mimes:pdf|max:10000',
            'company_effort' => 'required|mimes:pdf|max:10000',

        ]);


        //get db name for files uploaded
        $permit_db= $this->mPermit($request->current_permit);
        $understudy_cv_db= $this->mCv($request->understudy_cv);
        $takeover_db= $this->mTakover($request->takeover_evidence);
        $effort_db= $this->mEffort($request->company_effort);

        $passport_db = $this->mPassport($request->passport_pic);



        //loggedIn user id
        $currentuserid = Auth::user()->id;


        Renewal::create([
            'name'=>  $request->input('name'),
            'nationality'=> $request->input('nationality'),
            'passport_no'=> $request->input('passport_no'),
            'company'=> $request->input('company'),
            'gender'=>$request->input('gender'),
            'passport_pic'=>$passport_db,

            'user_id'=>$currentuserid,
            'current_permit' => $permit_db,
            'understudy_cv' => $understudy_cv_db,
            'takeover_evidence' => $takeover_db,
            'company_effort' => $effort_db,

        ]);

        session(['renewal' => 'Renewal application successful']);
        return redirect('/home');
    }




    public function mPassport($pdf_file)
    {//user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' .$userid. 'passport_pic' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('renewal_apps/passportPic'), $name);
        return $name;

    }
    public function mPermit($pdf_file){
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' .$userid. 'current_permit' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('renewal_apps/current_permit'), $name);
        return $name;

    }


    public function mCv($pdf_file){
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' .$userid. 'understudy_cv' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('renewal_apps/understudy_cv'), $name);
        return $name;

    }


    public function mTakover($pdf_file){
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-'.$userid. 'takeover' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('renewal_apps/takeover'), $name);
        return $name;

    }


    public function mEffort($pdf_file){
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' .$userid. 'C_Efforts' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('renewal_apps/Efforts'), $name);
        return $name;

    }
}
