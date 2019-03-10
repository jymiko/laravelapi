<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardstockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardstocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users')->unsigned()->index();
            $table->foreign('id_users')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->date('date');
            $table->integer('id_items')->unsigned()->index();
            $table->foreign('id_items')
                ->references('id')->on('items')
                ->onDelete('cascade');     
            $table->integer('qty_item');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardstocks');
    }
}
