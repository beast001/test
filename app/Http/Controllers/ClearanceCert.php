<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClearanceCert extends Controller
{
    public function load_cert(){
        return view('certificate');
    }
    public function print(){
        return view('print-cert');
    }
}
