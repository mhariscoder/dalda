<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSection1Image2ToCmsHome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_home', function (Blueprint $table) {
            $table->string('banner_mobile')->after('banner');
            $table->string('section1_image2')->after('section1_image');

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
            $table->dropColumn('banner_mobile');
            $table->dropColumn('section1_image2');


        });
    }
}
