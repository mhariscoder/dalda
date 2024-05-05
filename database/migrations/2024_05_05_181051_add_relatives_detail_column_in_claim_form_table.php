<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelativesDetailColumnInClaimFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claim_form', function (Blueprint $table) {
            $table->string('relatives_detail')->nullable()->after('current_college_institute_university');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claim_form', function (Blueprint $table) {
            $table->dropColumn([
                'relatives_detail'
            ]);
        });
    }
}
