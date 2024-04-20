<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCmsAbout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_about', function (Blueprint $table) {
            //
            $table->dropColumn('title');
            $table->dropColumn('short_description');
            $table->dropColumn('description');
            $table->string('section4_image2')->after('banner');
            $table->string('section4_description2')->after('banner');
            $table->string('section4_heading2')->after('banner');
            $table->string('section4_image1')->after('banner');
            $table->string('section4_description1')->after('banner');
            $table->string('section4_heading1')->after('banner');
            $table->string('section3_image')->after('banner');
            $table->string('section3_description')->after('banner');
            $table->string('section3_heading')->after('banner');
            $table->string('section2_content2')->after('banner');
            $table->string('section2_image2')->after('banner');
            $table->string('section2_content1')->after('banner');
            $table->string('section2_image1')->after('banner');
            $table->string('section1_description')->after('banner');
            $table->string('section1_heading')->after('banner');
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
        Schema::table('cms_about', function (Blueprint $table) {
            $table->string('title');
            $table->string('short_description');
            $table->string('description');
            $table->dropColumn('section4_image2');
            $table->dropColumn('section4_description2');
            $table->dropColumn('section4_heading2');
            $table->dropColumn('section4_image1');
            $table->dropColumn('section4_description1');
            $table->dropColumn('section4_heading1');
            $table->dropColumn('section3_image');
            $table->dropColumn('section3_description');
            $table->dropColumn('section3_heading');
            $table->dropColumn('section2_content2');
            $table->dropColumn('section2_image2');
            $table->dropColumn('section2_content1');
            $table->dropColumn('section2_image1');
            $table->dropColumn('section1_description');
            $table->dropColumn('section1_heading');
            $table->dropColumn('banner_heading');
        });
    }
}
