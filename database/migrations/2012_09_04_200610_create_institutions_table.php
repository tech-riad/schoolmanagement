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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('institution_id',50);
            $table->integer('seller_id');
            $table->integer('institution_package_id')->nullable();
            $table->string('title');
            $table->string('domain',50);
            $table->string('eiin',20)->nullable();
            $table->string('principal_name',100)->nullable();
            $table->string('phone',15);
            $table->integer('idcard_theam_id')->default(1);
            $table->string('email',100)->nullable();
            $table->string('password');
            $table->integer('district_id')->nullable();
            $table->integer('upazila_id')->nullable();
            $table->text('address')->nullable();
            $table->enum('payment_method', ['online', 'offline']);
            $table->date('active_date')->nulable();
            $table->date('expire_date')->nulable();
            $table->date('trial_period_end')->nulable();
            $table->enum('status', ['active', 'deactive','pending'])->default('pending');
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
        Schema::dropIfExists('institutes');
    }
};
