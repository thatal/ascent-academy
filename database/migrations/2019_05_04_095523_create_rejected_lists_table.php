<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRejectedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->string('rejected_by');
            $table->integer('rejected_by_id');
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
        Schema::dropIfExists('rejected_lists');
    }
}
