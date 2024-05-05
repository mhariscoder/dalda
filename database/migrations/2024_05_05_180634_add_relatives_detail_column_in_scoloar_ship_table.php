<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelativesDetailColumnInScoloarShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scoloar_ship', function (Blueprint $table) {
            $table->string('relatives_detail')->nullable()->after('residential_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scoloar_ship', function (Blueprint $table) {
            $table->dropColumn([
                'relatives_detail'
            ]);
        });
    }
}
