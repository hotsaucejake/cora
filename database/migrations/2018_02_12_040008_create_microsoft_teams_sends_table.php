<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrosoftTeamsSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microsoft_teams_sends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('microsoft_teams_exchange_id')->unsigned();
            $table->foreign('microsoft_teams_exchange_id')->references('id')->on('microsoft_teams_exchanges');
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
        Schema::dropIfExists('microsoft_teams_sends');
    }
}
