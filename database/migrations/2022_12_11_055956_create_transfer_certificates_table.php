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
        Schema::create('transfer_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->string('session');
            $table->string('class');
            $table->string('institution_name')->nullable();
            $table->string('shift')->nullable();
            $table->string('admission_no')->nullable();
            $table->string('section_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('group')->nullable();
            $table->date('dob')->nullable();
            $table->string('religion');
            $table->string('mobile_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email')->nullable();
            $table->bigInteger('roll_no');
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
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
        Schema::dropIfExists('transfer_certificates');
    }
};
