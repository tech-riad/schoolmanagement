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
        Schema::create('student_archives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->string('type')->nullable();
            $table->integer('id_no')->nullable();
            $table->integer('finger_id')->nullable();
            $table->foreignId('session_id');
            $table->foreignId('class_id');
            $table->foreignId('institution_id')->nullable();
            $table->string('shift_id')->nullable();
            $table->string('admission_no')->nullable();
            $table->string('section_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('group_id')->nullable();
            $table->date('dob')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('religion');
            $table->string('mobile_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email')->nullable();
            $table->bigInteger('roll_no');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('student_archives');
    }
};
