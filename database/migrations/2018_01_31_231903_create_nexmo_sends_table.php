<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNexmoSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nexmo_sends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nexmo_exchange_id')->unsigned();
            $table->foreign('nexmo_exchange_id')->references('id')->on('nexmo_exchanges');
            $table->unsignedBigInteger('to');
            $table->unsignedBigInteger('from');
            $table->text('text');
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
        Schema::dropIfExists('nexmo_sends');
    }
}
