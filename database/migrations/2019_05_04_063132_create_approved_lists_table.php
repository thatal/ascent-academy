<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('uid');
            $table->integer('student_id');
            $table->integer('application_id');
            $table->string('approved_by');
            $table->integer('approved_by_id');
            $table->string('category')->nullable()->comment('under which category student got selected');
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
        Schema::dropIfExists('approved_lists');
    }
}
