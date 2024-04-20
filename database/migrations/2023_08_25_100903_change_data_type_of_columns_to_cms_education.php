<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeOfColumnsToCmsEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_education', function (Blueprint $table) {

            $table->text('section7_description')->change();

            $table->text('section6_description')->change();

            $table->text('section5_content')->change();

            $table->text('section4_description')->change();

            $table->text('section3_description')->change();

            $table->text('section2_description')->change();

            $table->text('section1_description')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_education', function (Blueprint $table) {
            $table->string('section7_description')->change();

            $table->string('section6_description')->change();

            $table->string('section5_content')->change();

            $table->string('section4_description')->change();

            $table->string('section3_description')->change();

            $table->string('section2_description')->change();

            $table->string('section1_description')->change();
        });
    }
}
