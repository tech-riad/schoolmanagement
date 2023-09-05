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
        DB::unprepared('CREATE TRIGGER `update_stock_after_orders` AFTER UPDATE ON `sms_orders` FOR EACH ROW
        IF (NEW.status = "approve") THEN
            IF (OLD.status = "pending") THEN
                update stock_sms
                set total_balance = total_balance + NEW.total_sms,
                currentBalance = currentBalance + NEW.total_sms
                where institute_id=NEW.institute_id;
            END IF;
        END IF');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_stock_after_orders');
    }
};
