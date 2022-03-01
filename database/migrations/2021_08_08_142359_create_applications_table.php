<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id')->nullable();
            $table->unsignedBigInteger('borrower_id')->nullable();
            $table->unsignedBigInteger('consultant_id')->nullable();
            $table->date('consultant_assigned_date')->nullable();
            $table->string('consultant_status')->default('In Progress');
            $table->decimal('opening_interest')->default(0);
            $table->decimal('opening_late_interest')->default(0);
            $table->decimal('opening_permitted_fee')->default(0);
            $table->double('principal_paid')->default(0);
            $table->double('principal_due')->default(0);
            $table->double('interest_paid')->default(0);
            $table->double('last_paid')->default(0);
            $table->timestamp('last_followup')->nullable();
            $table->timestamp('next_call')->nullable();
            $table->string('application_type')->default('Normal');
            $table->string('status')->default('Pending');
            $table->boolean('verified')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->boolean('closed')->default(false);
            $table->timestamp('closed_at')->nullable();
            $table->text('remarks')->nullable();
            $table->date('loan_start_date')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
