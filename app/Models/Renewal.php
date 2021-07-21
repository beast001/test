<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    use HasFactory;
    protected $fillable = [

        'name','nationality', 'passport_no','company','passport_pic','gender','user_id','current_permit', 'understudy_cv', 'takeover_evidence','company_effort'
    ];
}
