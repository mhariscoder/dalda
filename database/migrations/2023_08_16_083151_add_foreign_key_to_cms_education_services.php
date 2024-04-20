<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCmsEducationServices extends Migration
{

    public function up()
    {
        Schema::table('cms_education_services', function (Blueprint $table) {
            $table->unsignedBigInteger('education_id');
            $table->foreign('education_id')->references('id')->on('cms_education')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::table('cms_education_services', function (Blueprint $table) {
            $table->dropForeign(['education_id']);
            $table->dropColumn('education_id');
        });
    }
}
