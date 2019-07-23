<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->integer('student_id');
            $table->integer('course_id');
            $table->integer('semester_id');
            $table->string('fullname');
            $table->string('gender');
            $table->date('dob');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->integer('annual_income');
            $table->string('religion');
            $table->integer('caste_id');
            $table->string('reserve_quota');
            $table->string('nationality');
            $table->string('state');
            $table->string('district');
            $table->string('city');
            $table->string('pin');
            $table->string('present_address');
            $table->string('parmanent_address');
            $table->string('last_board_or_university');
            $table->string('last_exam_roll');
            $table->string('last_exam_no');
            $table->integer('total_marks');
            $table->integer('percentage');
            $table->string('year');
            $table->string('blood_group');
            $table->string('passport');
            $table->string('sign');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::update("ALTER TABLE applications AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
