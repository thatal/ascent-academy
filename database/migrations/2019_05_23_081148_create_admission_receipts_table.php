<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->string('colletion_done_by');
            $table->string('colletion_done_by_id');
            $table->float('total', 8, 2);
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
        Schema::dropIfExists('admission_receipts');
    }
}
