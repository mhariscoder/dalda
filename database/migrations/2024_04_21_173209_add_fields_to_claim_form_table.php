<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToClaimFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claim_form', function (Blueprint $table) {
            $table->string('other_degree_option')->nullable()->after('parent_cnic_photo');
            $table->string('father_name')->nullable()->after('other_degree_option');
            $table->string('year')->nullable()->after('father_name');
            $table->string('achieved_position')->nullable()->after('year');
            $table->string('current_college_institute_university')->nullable()->after('achieved_position');
            $table->string('relatives_name')->nullable()->after('current_college_institute_university');
            $table->string('relatives_email')->nullable()->after('relatives_name');
            $table->string('relatives_contact')->nullable()->after('relatives_email');
            $table->text('relatives_address')->nullable()->after('relatives_contact');
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
                'other_degree_option',
                'father_name',
                'year',
                'achieved_position',
                'current_college_institute_university',
                'relatives_name',
                'relatives_email',
                'relatives_contact',
                'relatives_address'
            ]);
        });
    }
}
