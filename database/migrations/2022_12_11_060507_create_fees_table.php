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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('fees_type_id');
            $table->string('title');
            $table->string('date');
            $table->tinyInteger('month');
            $table->string('year');
            $table->date('due_date');
            $table->decimal('total_amount', 10,2)->nullable();
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('ins_classes')->onDelete('cascade');
            $table->foreign('fees_type_id')->references('id')->on('fees_types')->onDelete('cascade');
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
        Schema::dropIfExists('fees');
    }
};
