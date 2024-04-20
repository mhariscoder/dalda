<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsColumnsToHighAchieversStudents extends Migration
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
            $table->text('details')->nullable()->after('position');
            $table->text('description')->nullable()->after('position');
            $table->string('image')->nullable()->after('position');
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
            $table->dropColumn('details');
            $table->dropColumn('description');
            $table->dropColumn('image');
        });
    }
}
