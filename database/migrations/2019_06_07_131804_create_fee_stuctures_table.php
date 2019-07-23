<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeStucturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_stuctures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fee_id');
            $table->integer('fee_head_id');
            $table->integer('is_free')->comment('0:no; 1:yes');
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
        Schema::dropIfExists('fee_stuctures');
    }
}
