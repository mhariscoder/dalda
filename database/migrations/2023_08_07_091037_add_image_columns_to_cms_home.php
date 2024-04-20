<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnsToCmsHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_home', function (Blueprint $table) {
            //
            $table->string('section1_image')->after('section1_description');
            $table->string('card_section_image')->after('section2_heading');
            $table->string('section2_image')->after('section2_heading');
            $table->string('section6_sub_image1')->after('section6_sub_link1');
            $table->string('section6_sub_image2')->after('section6_sub_link2');
            $table->string('section6_sub_image3')->after('section6_sub_link3');
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
            //
            $table->dropColumn('section1_image');
            $table->dropColumn('card_section_image');
            $table->dropColumn('section2_image');
            $table->dropColumn('section6_sub_image1');
            $table->dropColumn('section6_sub_image2');
            $table->dropColumn('section6_sub_image3');
        });
    }
}
