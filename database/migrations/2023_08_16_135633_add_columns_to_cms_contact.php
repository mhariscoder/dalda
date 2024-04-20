<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCmsContact extends Migration
{

    public function up()
    {
        Schema::table('cms_contact', function (Blueprint $table) {
            $table->text('sub_heading')->after('title');
            $table->text('banner_heading')->after('banner');

        });
    }


    public function down()
    {
        Schema::table('cms_contact', function (Blueprint $table) {

            $table->dropColumn('sub_heading');
            $table->dropColumn('banner_heading');
        });
    }
}
