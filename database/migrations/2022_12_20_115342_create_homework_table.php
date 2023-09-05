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
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->string('filename')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->date('published_date')->nullable();
            $table->date('submit_date')->nullable();
            $table->foreignId('session_id')->constrained('sessions')->nullable();
            $table->foreignId('class_id')->constrained('ins_classes')->onDelete('cascade');
            $table->foreignId('shift_id')->constrained('shifts')->nullable();
            $table->foreignId('section_id')->constrained('sections')->nullable();
            $table->foreignId('category_id')->constrained('categories')->nullable();
            $table->foreignId('group_id')->constrained('groups')->nullable();

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
        Schema::dropIfExists('homework');
    }
};
