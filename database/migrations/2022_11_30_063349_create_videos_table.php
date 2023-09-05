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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->string('title')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('description')->nullable();
            $table->string('date')->nullable();
            $table->enum('type',['youtube','vimeo'])->default('youtube');
            $table->string('code');
            $table->integer('status')->default(true)->comment('Active=1, Inactive=0');
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
        Schema::dropIfExists('videos');
    }
};
