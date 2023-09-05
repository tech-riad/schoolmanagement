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
        Schema::create('chartof_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->string('acc_code')->nullable();
            $table->string('acc_code_bn')->nullable();
            $table->string('acc_head');
            $table->string('acc_head_bangla', 256)->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('acc_level')->default(0);
            $table->integer('order')->nullable();
            $table->foreign('institute_id')->references('id')->on('institutes');
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
        Schema::dropIfExists('chartof_accounts');
    }
};
