<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempAdmissionCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_admission_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('temp_receipt_id');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->integer('fee_head_id');
            $table->integer('fee_id');
            $table->float('amount', 8, 2);
            $table->float('free_amount', 8, 2);
            $table->integer('is_free');
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
        Schema::dropIfExists('temp_admission_collections');
    }
}
