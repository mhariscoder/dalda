<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToHighAchieversStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('high_achievers_students', function (Blueprint $table) {
            $table->string('designation')->nullable()->after('details');
            $table->text('organization')->nullable()->after('details');
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
            $table->dropColumn('designation');
            $table->dropColumn('organization');
        });
    }
}
