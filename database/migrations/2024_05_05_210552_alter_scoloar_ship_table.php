<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterScoloarShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scoloar_ship', function (Blueprint $table) {
            $table->string('student_email')->nullable()->after('relatives_detail');
            $table->string('intermediate_board')->nullable()->after('student_email');
            $table->string('gender')->nullable()->after('intermediate_board');
            $table->string('another_matric_group')->nullable()->after('gender');
            $table->string('another_intermediate_group')->nullable()->after('another_matric_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scoloar_ship', function (Blueprint $table) {
            $table->dropColumn([
                'student_email',
                'intermediate_board',
                'gender',
                'another_matric_group',
                'another_intermediate_group'
            ]);
        });
    }
}
