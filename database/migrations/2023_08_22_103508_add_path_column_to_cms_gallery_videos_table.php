<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPathColumnToCmsGalleryVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_gallery_videos', function (Blueprint $table) {
            //
            $table->string('path')->after('video_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_gallery_videos', function (Blueprint $table) {
            //
            $table->dropColumn('path');
        });
    }
}
