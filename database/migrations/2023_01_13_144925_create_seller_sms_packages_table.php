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
        Schema::create('seller_sms_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->string('title');
            $table->integer('total_sms');
            $table->double('sms_rate',10,2);
            $table->double('amount',10,2);
            $table->enum('status', ['active', 'deactive'])->default('active');
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
        Schema::dropIfExists('seller_sms_packages');
    }
};
