<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id');
            $table->string('date');
            $table->string('order_id');
            $table->string('customer_order_id');
            $table->string('bank_trx_id');
            $table->string('invoice_no');
            $table->string('status');
            $table->string('method');
            $table->string('transaction_status')->nullable();
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
        Schema::dropIfExists('online_payments');
    }
};
