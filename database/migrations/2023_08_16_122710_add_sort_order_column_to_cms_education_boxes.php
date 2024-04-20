<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSortOrderColumnToCmsEducationBoxes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_education_boxes', function (Blueprint $table) {
            $table->integer('sort_order')->after('heading');
            $table->unique('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_education_boxes', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
}
