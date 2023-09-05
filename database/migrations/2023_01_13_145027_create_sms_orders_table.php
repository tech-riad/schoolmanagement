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
        Schema::create('sms_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->integer('institute_id');
            $table->integer('seller_sms_package_id');
            $table->integer('total_sms');
            $table->double('amount',10,2);
            $table->enum('status', ['approve', 'pending'])->default('pending');
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
        Schema::dropIfExists('sms_orders');
    }
};
