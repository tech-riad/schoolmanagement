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
        Schema::create('academic_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institute_id')->nullable();
            $table->longText('admit_content')->nullable();
            $table->longText('id_card_content')->nullable();
            $table->longText('transfer_certificate_content')->nullable();
            $table->string('school_name')->nullable();
            $table->longText('testimonial_content')->nullable();
            $table->string('image')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('signText')->nullable();
            $table->string('signImage')->nullable();
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
        Schema::dropIfExists('academic_settings');
    }
};
