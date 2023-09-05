<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('CREATE TRIGGER `update_stock_after_histories` AFTER INSERT ON `sms_histories` FOR EACH ROW update stock_sms set 
            total_spend= total_spend + 1, 
            currentBalance=currentBalance - 1
            where institute_id = NEW.institute_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_stock_after_histories');
    }
};
