<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\NewApplicant as appmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewApplicant extends Controller
{
    public function new_applicant()
    {$user_id = Auth::user()->id;

        $messages =Message::where('to', '=', $user_id, 'AND', 'status', '=', 'unread')->get();
        $messages_no =Message::where('to', '=', $user_id)->get()->count();
        return view('new-application',[
            'messages'=>$messages,
            'messages_no'=>$messages_no,
        ]);
    }

    public function new_applicant_submit(Request $request)
    {

        //validation rules
        $request->validate([
            'name' => 'required|min:6',
            'nationality' => 'required',
            'passport_no' => 'required',
            'passport_pic' => 'required|mimes:pdf|max:10000',
            'gender' => 'required',
            'company_name' => 'required',
            'website' => 'required',
            'employee_no' => 'required',
            'core_business' => 'required',
            'company_reg_cert' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'employment_term' => 'required',
            'advert_lt' => 'required',
            'formal_lt' => 'required',
            'immigration_lt' => 'required',
            'justification_lt' => 'required',
            'understudy_lt' => 'required',
            'permit_copies' => 'required',

        ]);

        //get db name for files uploaded
        $passport_db = $this->picpasssport($request->passport_pic);
        $company_cert_db = $this->company_cert($request->company_reg_cert);
        $advert_db = $this->advert_file($request->advert_lt);
        $formal_letter_db = $this->formal_letter_file($request->formal_lt);
        $immigration_letter_db = $this->immigration_letter_file($request->immigration_lt);
        $just_letter_db = $this->just_letter_file($request->justification_lt);
        $understudy_db = $this->understudy_file($request->understudy_lt);
        $permit_copies_db = $this->permit_file($request->permit_copies);
//logged in user id
        $currentuserid = Auth::user()->id;


        appmodel::create([

            'user_id' => $currentuserid,
            'name' => $request->input('name'),
            'nationality' => $request->input('nationality'),
            'passport_no' => $request->input('passport_no'),
            'passport_pic' => $passport_db,
            'gender' => $request->input('gender'),
            'company_name' => $request->input('company_name'),
            'website' => $request->input('website'),
            'employee_no' => $request->input('employee_no'),
            'core_business' => $request->input('core_business'),
            'company_reg_cert' => $company_cert_db,
            'job_title' => $request->input('job_title'),
            'job_description' => $request->input('job_description'),
            'employment_term' => $request->input('employment_term'),
            'advert_lt' => $advert_db,
            'formal_lt' => $formal_letter_db,
            'immigration_lt' => $immigration_letter_db,
            'justification_lt' => $just_letter_db,
            'understudy_lt' => $understudy_db,
            'permit_copies' => $permit_copies_db,

        ]);

        session(['new_app' => 'new application successful']);
        return redirect('/home');
    }

    public function permit_file($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'permit_copies' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/permit_copies'), $name);
        return $name;

    }

    public function understudy_file($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'understudy_cv' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/understudy_cv'), $name);
        return $name;

    }

    public function just_letter_file($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'justification_letter' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/justification_letter'), $name);
        return $name;

    }

    public function immigration_letter_file($pdf_file)
    {
        //seting image name to be unique to store in db
        //user id
        $userid = Auth::user()->id;
        $name = time() . '-' . $userid . 'immigration_letter' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/immigration_letter'), $name);
        return $name;

    }


    public function formal_letter_file($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'icta_letter' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/icta_letter'), $name);
        return $name;

    }

    public function advert_file($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'JobAdvert' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/JobAdvert'), $name);
        return $name;

    }


    public function picpasssport($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'PassportPic' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/passport_pics'), $name);
        return $name;

    }

    public function company_cert($pdf_file)
    {
        //user id
        $userid = Auth::user()->id;
        //seting image name to be unique to store in db
        $name = time() . '-' . $userid . 'Registration_cert' . '.' . $pdf_file->extension();
        //store the image
        $pdf_file->move(public_path('files/Company_reg_cert'), $name);
        return $name;

    }
}
