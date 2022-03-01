<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type');
            $table->unsignedBigInteger('owner_id');
            $table->string('old_giro_bank')->nullable();
            $table->string('giro_bank_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('giro_branch')->nullable();
            $table->string('giro_account_number')->nullable();
            $table->date('giro_approval_date')->nullable();
            $table->string('dda_number')->nullable();
            $table->text('giro_remarks')->nullable();
            $table->string('batch_number')->nullable();
            $table->decimal('credit_limit')->default(0);
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
        Schema::dropIfExists('bank_accounts');
    }
}
