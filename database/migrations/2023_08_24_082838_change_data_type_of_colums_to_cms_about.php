<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeOfColumsToCmsAbout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_about', function (Blueprint $table) {

            $table->text('section4_description2')->change();
            $table->text('section4_heading2')->change();

            $table->text('section4_description1')->change();
            $table->text('section4_heading1')->change();

            $table->text('section3_description')->change();
            $table->text('section3_heading')->change();
            $table->text('section2_content2')->change();
            $table->text('section2_content1')->change();

            $table->text('section1_description')->change();
            $table->text('section1_heading')->change();
            $table->text('banner_heading')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_about', function (Blueprint $table) {

            $table->string('section4_description2')->change();
            $table->string('section4_heading2')->change();

            $table->string('section4_description1')->change();
            $table->string('section4_heading1')->change();

            $table->string('section3_description')->change();
            $table->string('section3_heading')->change();
            $table->string('section2_content2')->change();
            $table->string('section2_content1')->change();

            $table->string('section1_description')->change();
            $table->string('section1_heading')->change();
            $table->string('banner_heading')->change();
        });
    }
}
