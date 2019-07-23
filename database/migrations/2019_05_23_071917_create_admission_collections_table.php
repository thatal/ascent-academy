<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->integer('fee_head_id');
            $table->integer('fee_id');
            $table->float('amount', 8, 2);
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
        Schema::dropIfExists('admission_collections');
    }
}
