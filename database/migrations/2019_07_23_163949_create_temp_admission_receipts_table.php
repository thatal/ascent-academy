<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempAdmissionReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_admission_receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->float('total', 8, 2);
            $table->year('year');
            $table->integer('is_online')->default(0)->comment('0:No; 1:Yes');
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
        Schema::dropIfExists('temp_admission_receipts');
    }
}
