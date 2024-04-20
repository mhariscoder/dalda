<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCard3ColumnToCmsHome extends Migration
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
            $table->dropColumn('card3_heading');
            $table->dropColumn('card3_description');
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
            $table->text('card3_description')->after('card2_description');
            $table->string('card3_heading')->after('card2_description');
        });
    }
}
