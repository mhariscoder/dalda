<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsToCmsAgriculture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_agriculture', function (Blueprint $table) {
            $table->dropColumn('university_name');
            $table->dropColumn('web_url');
            $table->dropColumn('description');



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
            $table->string('university_name');
            $table->string('web_url');
            $table->text('description');



        });
    }
}
