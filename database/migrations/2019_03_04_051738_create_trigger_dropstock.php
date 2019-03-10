<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerDropstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `dropstock` AFTER DELETE ON `itemlists`
            FOR EACH ROW BEGIN
            update items
            set items.stock_item = items.stock_item - old.stock_item
            where items.id = old.id_item;
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
        db::unprepared('DROP TRIGGER `dropstock`');
    }
}
