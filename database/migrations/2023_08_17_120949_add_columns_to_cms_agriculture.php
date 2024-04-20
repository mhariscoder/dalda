<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCmsAgriculture extends Migration
{

    public function up()
    {
        Schema::table('cms_agriculture', function (Blueprint $table) {
            $table->string('heading')->after('id');
            $table->text('description')->after('heading');
            $table->string('section1_image1')->after('description');
            $table->text('section1_content1')->after('section1_image1');
            $table->string('section1_image2')->after('section1_content1');
            $table->text('section1_content2')->after('section1_image2');
            $table->string('section2_image')->after('section1_content2');
            $table->text('section2_content')->after('section2_image');
            $table->text('section3_heading')->after('section2_content');
            $table->text('section3_content')->after('section3_heading');
            $table->string('section4_image')->after('section3_content');
            $table->text('section4_content')->after('section4_image');
            $table->string('banner')->after('section4_content');
            $table->text('banner_heading')->after('banner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_agriculture', function (Blueprint $table) {
            $table->dropColumn('heading');
            $table->dropColumn('description');
            $table->dropColumn('section1_image1');
            $table->dropColumn('section1_content1');
            $table->dropColumn('section1_image2');
            $table->dropColumn('section1_content2');
            $table->dropColumn('section2_image');
            $table->dropColumn('section2_content');
            $table->dropColumn('section3_heading');
            $table->dropColumn('section3_content');
            $table->dropColumn('section4_image');
            $table->dropColumn('section4_content');
            $table->dropColumn('banner');

            $table->dropColumn('banner_heading');
        });
    }
}
