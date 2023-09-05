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
        Schema::create('teacher_leaveaplications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreignId('teacher_user_id')->constrained('teacher_users')->onDelete('cascade');
            $table->integer('template_id');
            $table->string('application');
            $table->date('to_date');
            $table->date('from_date');
            $table->date('approved_date')->nullable();
            $table->bigInteger('total_day');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('teacher_leaveaplications');
    }
};
