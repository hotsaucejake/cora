<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkypeSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skype_sends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skype_exchange_id')->unsigned();
            $table->foreign('skype_exchange_id')->references('id')->on('skype_exchanges');
            $table->string('type');
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
        Schema::dropIfExists('skype_sends');
    }
}
