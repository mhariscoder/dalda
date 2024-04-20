<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnToCmsHealths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_healths', function (Blueprint $table) {
            $table->dropColumn('section2_image1');
            $table->dropColumn('section2_image2');
            $table->dropColumn('section2_image3');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_healths', function (Blueprint $table) {
            $table->string('section2_image1');
            $table->string('section2_image2');
            $table->string('section2_image3');
        });
    }
}
