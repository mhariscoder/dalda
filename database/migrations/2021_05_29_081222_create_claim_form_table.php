<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_form', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char('student_id',10);
            $table->string('fullname',100);
            $table->string('board_intermediate',100)->nullable();
            $table->string('marks_in_matric',10)->nullable();
            $table->string('marks_in_intermediate',10)->nullable();
            $table->string('marks_in_bachelor_one',10)->nullable();
            $table->string('marks_in_bachelor_two',10)->nullable();
            $table->string('marks_in_bachelor_three',10)->nullable();
            $table->string('marks_in_bachelor_four',10)->nullable();
            $table->string('marks_in_bachelor_five',10)->nullable();
            $table->string('degree_name',10)->nullable();
            $table->string('current_city',150)->nullable();
            $table->string('beneficary_name',150)->nullable();
            $table->string('beneficary_iban_number',150)->nullable();
            $table->string('beneficary_bank',150)->nullable();
            $table->string('beneficary_cnic',150)->nullable();
            $table->string('cnic_number',15)->nullable();
            $table->string('mobile_number',15)->nullable();
            $table->string('whatsapp_number',15)->nullable();
            $table->string('email_address',100);
            $table->text('goals')->nullable();
            $table->text('suggestion')->nullable();
            $table->text('your_contribution')->nullable();
            $table->char('international_scolarship',10)->nullable();
            $table->char('standarized_test',10)->nullable();
            $table->char('english_ability_test',10)->nullable();
            $table->text('share_any')->nullable();
            $table->string('student_photo',50)->nullable();
            $table->string('matric_photo',50)->nullable();
            $table->string('intermediate_photo',50)->nullable();
            $table->string('bachelor_one_photo',50)->nullable();
            $table->string('bachelor_two_photo',50)->nullable();
            $table->string('bachelor_three_photo',50)->nullable();
            $table->string('bachelor_four_photo',50)->nullable();
            $table->string('bachelor_five_photo',50)->nullable();
            $table->string('beneficary_cnic_photo',50)->nullable();
            $table->string('parent_cnic_photo',50)->nullable();
            $table->enum('status',['pending','approved','rejected']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_form');
    }
}
