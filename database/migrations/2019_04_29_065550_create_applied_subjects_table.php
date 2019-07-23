<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliedSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->integer('subject_id');
            $table->integer('status')->comment('1:active, 2:changed')->default(1);
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
        Schema::dropIfExists('applied_subjects');
    }
}
