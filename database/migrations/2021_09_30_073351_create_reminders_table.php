<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id')->nullable();
            $table->unsignedBigInteger('application_id');
            $table->string('creator_type');
            $table->unsignedBigInteger('creator_id');
            $table->string('reminder_type');
            $table->boolean('mode_email')->default(false);
            $table->boolean('mode_sms')->default(false);
            $table->text('content');
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('reminders');
    }
}
