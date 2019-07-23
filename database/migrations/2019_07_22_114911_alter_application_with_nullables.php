<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApplicationWithNullables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            // $table->uuid('uuid')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('last_board_or_university_state')->nullable()->change();
            $table->string('mothers_name')->nullable()->change();
            $table->integer('annual_income')->nullable()->change();
            $table->string('religion')->nullable()->change();
            $table->string('sub_1_name')->nullable()->change();
            $table->float('sub_1_total')->nullable()->change();
            $table->float('sub_1_score')->nullable()->change();

            $table->string('sub_2_name')->nullable()->change();
            $table->float('sub_2_total')->nullable()->change();
            $table->float('sub_2_score')->nullable()->change();

            $table->string('sub_3_name')->nullable()->change();
            $table->float('sub_3_total')->nullable()->change();
            $table->float('sub_3_score')->nullable()->change();

            $table->string('sub_4_name')->nullable()->change();
            $table->float('sub_4_total')->nullable()->change();
            $table->float('sub_4_score')->nullable()->change();

            $table->string('sub_5_name')->nullable()->change();
            $table->float('sub_5_total')->nullable()->change();
            $table->float('sub_5_score')->nullable()->change();

            $table->string('sub_6_name')->nullable()->change();
            $table->float('sub_6_total')->nullable()->change();
            $table->float('sub_6_score')->nullable()->change();

            $table->decimal('total_marks_according_marksheet',6,2)->nullable()->change();
            $table->decimal('all_total_marks',6,2)->nullable()->change();

            $table->decimal('percentage',6,2)->nullable()->change();

            $table->string('year')->nullable()->change();
            $table->string('blood_group')->nullable()->change();
            $table->string('passport')->nullable()->change();
            $table->string('sign')->nullable()->change();
            $table->string('blood_group')->nullable()->change();
            $table->string('passport')->nullable()->change();
            $table->string('sign')->nullable()->change();
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
