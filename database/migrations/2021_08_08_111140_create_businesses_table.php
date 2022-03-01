<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('registration_type')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('logo')->nullable();
            $table->string('hand_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('sms_phone')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country')->nullable();
            $table->string('incorporation_type')->nullable();
            $table->unsignedBigInteger('loan_limit')->default(0)->nullable();
            $table->decimal('total_lending')->default(0);
            $table->decimal('total_collected')->default(0);
            $table->decimal('total_profit')->default(0);
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->unsignedBigInteger('sub_industry_id')->nullable();
            $table->string('business_type')->default('Normal');
            $table->boolean('blacklisted')->default(false);
            $table->text('blacklisting_remarks')->nullable();
            $table->boolean('corporate')->default(false);
            $table->boolean('vip')->default(false);
            $table->unsignedBigInteger('primary_contact')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
