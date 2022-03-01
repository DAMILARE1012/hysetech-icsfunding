<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('photo')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('sms_phone')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('designation')->nullable();
            $table->date('appointment_date')->nullable();
            $table->date('resignation_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->decimal('monthly_salary')->default(0);
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('referee_code')->nullable();
            $table->boolean('terms_consent')->default(false);
            $table->boolean('active')->default(true);
            $table->boolean('primary_account')->default(false);
            $table->boolean('appointed_director')->default(false);
            $table->boolean('blacklisted')->default(false);
            $table->boolean('app_signup')->default(false);
            $table->string('api_token')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('business_id')->nullable();
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
        Schema::dropIfExists('borrowers');
    }
}
