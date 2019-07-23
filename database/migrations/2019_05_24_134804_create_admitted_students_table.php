<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmittedStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitted_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id');
            $table->string('student_id');
            $table->string('uid');
            $table->year('year');
            $table->string('admission_done_by');
            $table->integer('admission_done_by_id');
            $table->softDeletes();
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
        Schema::dropIfExists('admitted_students');
    }
}
