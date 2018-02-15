<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiscoSparkExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cisco_spark_exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cisco_id', 255);
            $table->string('room_id', 255);
            $table->string('room_type');
            $table->text('text');
            $table->string('person_id', 255);
            $table->string('person_email');
            $table->dateTime('message_timestamp');
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
        Schema::dropIfExists('cisco_spark_exchanges');
    }
}
