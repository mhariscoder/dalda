<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSScreeningCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_screening_criteria', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->text('criteria_points');
            $table->string('section2_heading');
            $table->string('section2_image');
            $table->text('section2_content');
            $table->text('section3_heading');
            $table->text('section3_description');
            $table->text('high_achievers_points');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_screening_criteria');
    }
}
