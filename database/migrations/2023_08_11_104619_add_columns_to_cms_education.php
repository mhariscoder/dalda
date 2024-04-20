<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCmsEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_education', function (Blueprint $table) {
            $table->dropColumn('institute_name');
            $table->dropColumn('web_url');
            $table->dropColumn('description');
            $table->string('section7_image')->after('id');
            $table->string('section7_description')->after('id');
            $table->string('section7_heading')->after('id');
            $table->string('section6_description')->after('id');
            $table->string('section6_heading')->after('id');
            $table->string('section5_content')->after('id');
            $table->string('section4_image')->after('id');
            $table->string('section4_description')->after('id');
            $table->string('section4_heading')->after('id');
            $table->string('section3_description')->after('id');
            $table->string('section3_heading')->after('id');
            $table->string('section3_image')->after('id');
            $table->string('section2_description')->after('id');
            $table->string('section2_image')->after('id');
            $table->string('section1_description')->after('id');
            $table->string('section1_heading')->after('id');
            $table->string('banner_heading')->after('id');
            $table->string('banner')->after('id');
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
            $table->string('institute_name');
            $table->string('web_url');
            $table->string('description');
            $table->dropColumn('section7_image');
            $table->dropColumn('section7_description');
            $table->dropColumn('section7_heading');
            $table->dropColumn('section6_description');
            $table->dropColumn('section6_heading');
            $table->dropColumn('section5_content');
            $table->dropColumn('section4_image');
            $table->dropColumn('section4_description');
            $table->dropColumn('section4_heading');
            $table->dropColumn('section3_description');
            $table->dropColumn('section3_heading');
            $table->dropColumn('section3_image');
            $table->dropColumn('section2_description');
            $table->dropColumn('section2_image');
            $table->dropColumn('section1_description');
            $table->dropColumn('section1_heading');
            $table->dropColumn('banner_heading');
            $table->dropColumn('banner');
        });
    }
}
