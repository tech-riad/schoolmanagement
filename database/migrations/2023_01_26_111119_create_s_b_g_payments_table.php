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
        Schema::create('s_b_g_payments', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('invoice_no');
            $table->string('transaction_id');
            $table->string('br_code');
            $table->string('pay_mode');
            $table->string('total_amount');
            $table->string('pay_amount');
            $table->string('payment_status');
            $table->string('status');
            $table->string('message');
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
        Schema::dropIfExists('s_b_g_payments');
    }
};
