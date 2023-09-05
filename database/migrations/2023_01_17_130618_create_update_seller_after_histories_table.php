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
        DB::unprepared('CREATE TRIGGER `update_seller_after_histories` AFTER INSERT ON `sms_histories` FOR EACH ROW UPDATE sellers
            set sms_balance = sms_balance-1
            where id =(SELECT seller_id FROM `institutes` WHERE id = NEW.institute_id)
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_seller_after_histories');
    }
};
