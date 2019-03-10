<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerDropcard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `dropcard` AFTER DELETE ON `cardstocks`
            FOR EACH ROW BEGIN
            UPDATE items
            set items.stock_item = items.stock_item + old.qty_item
            where items.id = old.id_items;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `dropcard`');
    }
}
