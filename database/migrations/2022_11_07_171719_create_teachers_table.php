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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->foreignId('designation_id')->constrained('designations')->onDelete('cascade');
            $table->uuid('uuid')->unique()->nullable();
            $table->string('id_no')->nullable();
            $table->integer('finger_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('instituition_id')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('nid')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('photo')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
