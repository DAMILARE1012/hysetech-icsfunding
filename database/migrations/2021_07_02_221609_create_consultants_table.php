<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('hand_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_type')->nullable();
            $table->string('gender')->nullable();
            $table->double('gross_monthly_income')->nullable();
            $table->double('past_six_months_income')->nullable();
            $table->string('employer')->nullable();
            $table->string('designation')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->nullable();
            $table->boolean('active')->default(false);
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->boolean('terms_consent')->default(false);
            $table->boolean('profile_complete')->default(false);
            $table->text('performance_details')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('consultants');
    }
}
