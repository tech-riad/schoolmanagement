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
        Schema::create('sub_marks_dist_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_marks_dist_id')->default(1);
            $table->unsignedBigInteger('sub_marks_dist_type_id')->default(1);
            $table->string('mark');
            $table->string('pass_mark');
            $table->foreign('sub_marks_dist_id')->references('id')->on('sub_marks_dists');
            $table->foreign('sub_marks_dist_type_id')->references('id')->on('sub_marks_dist_types');
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
        Schema::dropIfExists('sub_marks_dist_details');
    }
};
