<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApplicationsForNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('present_vill_or_town')->nullable()->change();
            $table->string('present_city')->nullable()->change();
            $table->string('present_state')->nullable()->change();
            $table->string('present_district')->nullable()->change();
            $table->bigInteger('present_pin')->nullable()->change();
            $table->string('present_nationality')->nullable()->change();
            $table->string('permanent_vill_or_town')->nullable()->change();
            $table->string('permanent_city')->nullable()->change();
            $table->string('permanent_state')->nullable()->change();
            $table->string('permanent_district')->nullable()->change();
            $table->bigInteger('permanent_pin')->nullable()->change();
            $table->string('permanent_nationality')->nullable()->change();
            $table->string('last_board_or_university')->nullable()->change();
            $table->string('last_exam_roll')->nullable()->change();
            $table->string('last_exam_no')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            //
        });
    }
}
