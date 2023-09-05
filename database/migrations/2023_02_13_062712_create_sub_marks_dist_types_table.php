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
        Schema::create('sub_marks_dist_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->string('title');
            $table->string('details')->nullable();
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
        Schema::dropIfExists('sub_marks_dist_types');
    }
};
