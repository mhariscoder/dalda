<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_healths', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('description');
            $table->string('section1_image1');
            $table->text('section1_content1');
            $table->string('section1_image2');
            $table->text('section1_content2');
            $table->text('section2_content');
            $table->string('section2_image1');
            $table->string('section2_image2');
            $table->string('section2_image3');
            $table->text('content');
            $table->string('banner');
            $table->text('banner_heading');
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
        Schema::dropIfExists('cms_healths');
    }
}
