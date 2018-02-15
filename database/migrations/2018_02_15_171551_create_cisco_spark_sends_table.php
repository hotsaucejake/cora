<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiscoSparkSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cisco_spark_sends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cisco_spark_exchange_id')->unsigned();
            $table->foreign('cisco_spark_exchange_id')->references('id')->on('cisco_spark_exchanges');
            $table->string('room_id', 255);
            $table->text('text');
            $table->text('markdown');
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
        Schema::dropIfExists('cisco_spark_sends');
    }
}
