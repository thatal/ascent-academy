<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicationNewFieldSub7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('tel_no', 20)->nullable()->after("permanent_tel");
            $table->string('sub_7_name')->nullable()->after("sub_6_score");
            $table->float('sub_7_total')->nullable()->after("sub_7_name");
            $table->float('sub_7_score')->nullable()->after("sub_7_total");

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
            $table->dropColumn(['tel_no', "sub_7_name", "sub_7_total", "sub_7_score"]);
        });
    }
}
