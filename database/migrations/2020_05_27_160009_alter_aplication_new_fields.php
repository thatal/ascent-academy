<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAplicationNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            if(Schema::hasColumn('applications', 'free_admission')) {
                $table->dropColumn('free_admission');
            }
            if(Schema::hasColumn('applications', 'present_nationality')) {
                $table->dropColumn('present_nationality');
            }
            if(Schema::hasColumn('applications', 'annual_income')) {
                $table->dropColumn('annual_income');
            }
            if(Schema::hasColumn('applications', 'religion')) {
                $table->dropColumn('religion');
            }
            if(Schema::hasColumn('applications', 'blood_group')) {
                $table->dropColumn('blood_group');
            }
            if(Schema::hasColumn('applications', 'co_curricular')) {
                $table->dropColumn('co_curricular');
            }
            if(Schema::hasColumn('applications', 'differently_abled')) {
                $table->dropColumn('differently_abled');
            }
            $table->double('age', 3,0)->after('percentage');
            $table->string('father_occupation', 200)->nullable()->after('age');
            $table->string('guardian_relationship', 200)->nullable()->after('father_occupation');
            $table->string('present_tel', 20)->nullable()->after('guardian_relationship');
            $table->string('permanent_tel', 20)->nullable()->after('present_tel');
            $table->string('last_exam_year', 20)->nullable()->after('permanent_tel');
            $table->string('last_exam_result', 20)->nullable()->after('last_exam_year');
            $table->string('last_attended_school', 200)->nullable()->after('last_exam_result');
            $table->string('qualifying_examination', 50)->nullable()->after('last_attended_school');
            $table->string('admission_is_sought_as', 50)->nullable()->after('qualifying_examination');
            $table->tinyInteger('declaration')->nullable()->after('admission_is_sought_as');
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
            $table->dropColumn(["age", "father_occupation", "guardian_relationship",
            "present_tel", "permanent_tel", "last_exam_year", "last_exam_result",
            "last_attended_school", "qualifying_examination", "admission_is_sought_as", "declaration"]);
        });
    }
}
