<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniNameColumnToHighAchieversStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('high_achievers_students', function (Blueprint $table) {
            //
            $table->string('uni_name')->after('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('high_achievers_students', function (Blueprint $table) {
            //
            $table->dropColumn('uni_name');
        });
    }
}
