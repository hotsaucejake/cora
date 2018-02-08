<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkypeExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skype_exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->string('type');
            $table->dateTime('message_timestamp');
            $table->unsignedBigInteger('skype_id');
            $table->string('channel_id', 255);
            $table->string('service_url', 255);
            $table->string('from_id', 255);
            $table->string('from_name', 255)->nullable();
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
        Schema::dropIfExists('skype_exchanges');
    }
}
