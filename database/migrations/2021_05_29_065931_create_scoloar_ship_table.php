<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoloarShipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoloar_ship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char('student_id',10)->nullable();
            $table->string('year',12);
            $table->string('fullname',100);
            $table->string('matric_board',150)->nullable();
            $table->string('marks_in_matric',150)->nullable();
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
            $table->string('marksheet_photo',50)->nullable();
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
        Schema::dropIfExists('scoloar_ship');
    }
}
