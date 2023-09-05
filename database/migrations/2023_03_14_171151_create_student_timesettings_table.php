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
        Schema::create('student_timesettings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreignId('ins_class_id')->constrained('ins_classes')->onDelete('cascade');
            $table->string('in_time');
            $table->string('out_time');
            $table->string('max_delay_time');
            $table->string('max_early_time');
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
        Schema::dropIfExists('student_timesettings');
    }
};
