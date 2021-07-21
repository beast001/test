<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewApplicant extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
//    protected $table = 'new_applicants';

    protected $fillable = [

        'user_id', 'name', 'nationality', 'passport_no','gender', 'company_name','website','employment_term', 'job_title', 'job_description', 'employee_no', 'core_business','passport_pic',
        'company_reg_cert','formal_lt','immigration_lt','justification_lt','understudy_lt', 'permit_copies','advert_lt',

    ];
}
