<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_heroes', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->unique();
            $table->string('title');
            $table->string('designation');
            $table->string('department');
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('cms_home')
                ->onDelete('cascade');
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
        Schema::dropIfExists('home_heroes');
    }
}
