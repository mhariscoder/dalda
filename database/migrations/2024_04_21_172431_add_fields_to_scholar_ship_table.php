<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToScholarShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scoloar_ship', function (Blueprint $table) {
            $table->string('scholarship_as_per_education')->nullable()->after('parent_cnic_photo');
            $table->string('father_name')->nullable()->after('scholarship_as_per_education');
            $table->text('position_board_detail')->nullable()->after('father_name');
            $table->text('career_path_details')->nullable()->after('position_board_detail');
            $table->string('matriculation_year')->nullable()->after('career_path_details');
            $table->string('preferred_test_location')->nullable()->after('matriculation_year');
            $table->string('intermediate_studies')->nullable()->after('preferred_test_location');
            $table->text('residential_address')->nullable()->after('intermediate_studies');
            $table->text('relatives_name')->nullable()->after('residential_address');
            $table->text('relatives_email')->nullable()->after('relatives_name');
            $table->text('relatives_contact')->nullable()->after('relatives_email');
            $table->text('relatives_address')->nullable()->after('relatives_contact');
            $table->text('madrasa_name')->nullable()->after('relatives_address');
            $table->text('madrasa_address')->nullable()->after('madrasa_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholar_ship', function (Blueprint $table) {
            $table->dropColumn([
                'scholarship_as_per_education',
                'father_name',
                'position_board_detail',
                'career_path_details',
                'matriculation_year',
                'preferred_test_location',
                'intermediate_studies',
                'residential_address',
                'relatives_name',
                'relatives_email',
                'relatives_contact',
                'relatives_address',
                'madrasa_name',
                'madrasa_address',
            ]);
        });
    }
}
