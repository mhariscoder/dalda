<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsToCmsHome extends Migration
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
            $table->string('section6_sub_link3')->after('banner');
            $table->string('section6_sub_description3')->after('banner');
            $table->string('section6_sub_heading3')->after('banner');
            $table->string('section6_sub_link2')->after('banner');
            $table->string('section6_sub_description2')->after('banner');
            $table->string('section6_sub_heading2')->after('banner');
            $table->string('section6_sub_link1')->after('banner');
            $table->string('section6_sub_description1')->after('banner');
            $table->string('section6_sub_heading1')->after('banner');
            $table->string('section6_heading')->after('banner');
            $table->string('section5_description')->after('banner');
            $table->string('section5_heading')->after('banner');
            $table->string('section4_description')->after('banner');
            $table->string('section4_heading')->after('banner');
            $table->string('section3_sub_content')->after('banner');
            $table->string('section3_sub_description')->after('banner');
            $table->string('section3_sub_heading')->after('banner');
            $table->string('section3_description')->after('banner');
            $table->string('section3_heading')->after('banner');
            $table->string('card3_description')->after('banner');
            $table->string('card3_heading')->after('banner');
            $table->string('card2_description')->after('banner');
            $table->string('card2_heading')->after('banner');
            $table->string('card1_description')->after('banner');
            $table->string('card1_heading')->after('banner');
            $table->string('section2_heading')->after('banner');
            $table->string('section1_description')->after('banner');
            $table->string('section1_heading')->after('banner');
            $table->string('banner_description')->after('banner');
            $table->string('banner_heading')->after('banner');
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
            $table->dropColumn('section6_sub_link3');
            $table->dropColumn('section6_sub_description3');
            $table->dropColumn('section6_sub_heading3');
            $table->dropColumn('section6_sub_link2');
            $table->dropColumn('section6_sub_description2');
            $table->dropColumn('section6_sub_heading2');
            $table->dropColumn('section6_sub_link1');
            $table->dropColumn('section6_sub_description1');
            $table->dropColumn('section6_sub_heading1');
            $table->dropColumn('section6_heading');
            $table->dropColumn('section5_description');
            $table->dropColumn('section5_heading');
            $table->dropColumn('section4_description');
            $table->dropColumn('section4_heading');
            $table->dropColumn('section3_sub_content');
            $table->dropColumn('section3_sub_description');
            $table->dropColumn('section3_sub_heading');
            $table->dropColumn('section3_description');
            $table->dropColumn('section3_heading');
            $table->dropColumn('card3_description');
            $table->dropColumn('card3_heading');
            $table->dropColumn('card2_description');
            $table->dropColumn('card2_heading');
            $table->dropColumn('card1_description');
            $table->dropColumn('card1_heading');
            $table->dropColumn('section2_heading');
            $table->dropColumn('section1_description');
            $table->dropColumn('section1_heading');
            $table->dropColumn('banner_description');
            $table->dropColumn('banner_heading');
        });
    }
}
