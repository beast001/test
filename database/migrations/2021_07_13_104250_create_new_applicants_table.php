<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_applicants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('nationality');
            $table->string('passport_no');
            $table->string('gender');
            $table->string('company_name');
            $table->string('website');
            $table->string('employment_term');
            $table->string('job_title');
            $table->text('job_description');
            $table->integer('employee_no');
            $table->string('core_business');
            $table->string('status')->default('pending');
            $table->string('company_reg_cert');
            $table->string('passport_pic');
            $table->string('formal_lt');
            $table->string('immigration_lt');
            $table->string('justification_lt');
            $table->string('understudy_lt');
            $table->string('advert_lt');
            $table->string('permit_copies');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_applicants');
    }
}
