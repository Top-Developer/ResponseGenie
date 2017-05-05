<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->increments('rate_id');
            $table->string('rate_title', 128);
            $table->integer('club_id')->references('club_id')->on('club');
            $table->integer('event_id')->length(11)->unsigned();
            $table->float('rate_cost', 15, 2);
            $table->integer('rate_duration');
            $table->boolean('privacy');         //1=private, only viewable to club members
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
        Schema::dropIfExists('rate');
    }
}
