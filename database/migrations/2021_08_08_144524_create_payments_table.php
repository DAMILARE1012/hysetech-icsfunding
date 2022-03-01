<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->string('payable_type')->nullable();
            $table->date('payment_date')->nullable();
            $table->decimal('payable_amount')->nullable()->default(0);
            $table->decimal('amount_paid')->nullable()->default(0);
            $table->decimal('amount_to_principal')->nullable()->default(0);
            $table->decimal('late_loan_fee')->nullable()->default(0);
            $table->decimal('amount_to_permitted_fees')->nullable()->default(0);
            $table->string('status')->default('Yet to pay');
            $table->date('last_followup_date')->nullable();
            $table->date('next_call_date')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
