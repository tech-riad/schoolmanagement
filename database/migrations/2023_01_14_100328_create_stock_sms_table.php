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
        Schema::create('stock_sms', function (Blueprint $table) {
            $table->id();
            $table->integer('institute_id');
            $table->integer('total_balance');
            $table->integer('total_spend');
            $table->integer('currentBalance');
            $table->integer('alertBalance');
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
        Schema::dropIfExists('stock_sms');
    }
};
