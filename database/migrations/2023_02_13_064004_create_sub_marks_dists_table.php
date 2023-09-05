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
        Schema::create('sub_marks_dists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('subject_id')->default(1);
            $table->string('total_mark');
            $table->string('pass_mark');
            $table->string('take')->default(100);
            $table->string('grace');
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
        Schema::dropIfExists('sub_marks_dists');
    }
};
