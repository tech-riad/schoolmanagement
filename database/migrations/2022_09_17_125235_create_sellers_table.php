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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id');
            $table->foreignId('seller_id')->nullable();
            $table->foreignId('seller_package_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('sms_balance')->default(0);
            $table->enum('payment_method',['online','offline']);
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->string('image')->default('default.png');
            $table->string('district');
            $table->string('upazila');
            $table->date('active_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->string('password');
            $table->enum('status',['active','deactive','pending'])->default('pending');
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
        Schema::dropIfExists('sellers');
    }
};
