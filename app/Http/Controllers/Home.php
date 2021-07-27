<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\NewApplicant;
use App\Models\Renewal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function home(){
        $user_id = Auth::user()->id;
        $new_applications =NewApplicant::where('user_id','=', $user_id)->get();
        $renewal_applications= Renewal::where('user_id','=', $user_id)->get();
        $user_id = Auth::user()->id;

        $messages =Message::where('to', '=', $user_id, 'AND', 'status', '=', 'unread')->orderByDesc('created_at')->get();
        $messages_no =Message::where('to', '=', $user_id)->get()->count();

        return view('home',[
            'new_applications'=>$new_applications,
            'renewal_applications'=>$renewal_applications,
            'messages'=>$messages,
            'messages_no'=>$messages_no,
        ]);
    }
}
