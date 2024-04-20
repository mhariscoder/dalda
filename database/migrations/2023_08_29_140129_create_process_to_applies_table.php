<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessToAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_to_applies', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('sub_heading');
            $table->text('description');
            $table->string('image');
            $table->text('image_description1');
            $table->text('image_description2');
            $table->text('apply_steps');
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
        Schema::dropIfExists('process_to_applies');
    }
}
