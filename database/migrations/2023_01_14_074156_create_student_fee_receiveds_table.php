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
        Schema::create('student_fee_receiveds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id');
            $table->string('date');
            $table->foreignId('student_id');
            $table->string('year');
            $table->string('month');
            $table->float('total');
            $table->string('payment_type')->default('offline');
            $table->foreignId('status')->default(0);
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
        Schema::dropIfExists('student_fee_receiveds');
    }
};
