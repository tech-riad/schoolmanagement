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
        Schema::create('book_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->default(1);
            $table->string('book_name')->nullable();
            $table->string('edition')->nullable();
            $table->string('writter_name')->nullable();
            $table->foreignId('class_id')->constrained('ins_classes')->onDelete('cascade');
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
        Schema::dropIfExists('book_lists');
    }
};
