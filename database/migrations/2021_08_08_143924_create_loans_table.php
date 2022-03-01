<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('loan_type_id');
            $table->integer('tenure')->default(0); // months
            $table->string('payment_plan')->default('monthly');
            $table->decimal('amount')->default(0);
            $table->double('interest_rate')->default(0);
            $table->double('late_fee')->default(0);
            $table->double('contract_variation_fee')->default(0);
            $table->string('interest_type')->default('Compound Interest');
            $table->boolean('active')->default(true);
            $table->boolean('counter_offer')->default(false);
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
        Schema::dropIfExists('loans');
    }
}
