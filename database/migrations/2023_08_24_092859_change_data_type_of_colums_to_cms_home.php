<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeOfColumsToCmsHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_home', function (Blueprint $table) {
            $table->text('banner_description')->change();
            $table->text('section1_description')->change();
            $table->text('card1_description')->change();
            $table->text('card2_description')->change();
            $table->text('card3_description')->change();
            $table->text('section3_description')->change();
            $table->text('section3_sub_description')->change();
            $table->text('section3_sub_content')->change();
            $table->text('section4_description')->change();
            $table->text('section5_description')->change();

            $table->text('section6_sub_description1')->change();
            $table->text('section6_sub_description2')->change();
            $table->text('section6_sub_description3')->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_home', function (Blueprint $table) {
            $table->string('banner_description')->change();
            $table->string('section1_description')->change();
            $table->string('card1_description')->change();
            $table->string('card2_description')->change();
            $table->string('card3_description')->change();
            $table->string('section3_description')->change();
            $table->string('section3_sub_description')->change();
            $table->string('section3_sub_content')->change();
            $table->string('section4_description')->change();
            $table->string('section5_description')->change();

            $table->string('section6_sub_description1')->change();
            $table->string('section6_sub_description2')->change();
            $table->string('section6_sub_description3')->change();

        });
    }
}
