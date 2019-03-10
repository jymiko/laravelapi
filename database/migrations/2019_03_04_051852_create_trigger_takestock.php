<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerTakestock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `takestock` AFTER INSERT ON `cardstocks`
            FOR EACH ROW BEGIN
            update items
            set items.stock_item = items.stock_item - new.qty_item
            where items.id = new.id_items;
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
        DB::unprepared('DROP TRIGGER `takestock`');
    }
}
