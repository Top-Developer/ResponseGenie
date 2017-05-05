<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('event_title', 128);
            $table->string('event_shortname', 128);
            $table->date('event_start_date');
            $table->date('event_end_date');
            $table->string('event_slug');
            $table->string('event_url');
            $table->string('event_facebook');
            $table->integer('membership_limit');
            $table->text('event_description');
            $table->string('event_short_description', 128);
            $table->integer('club_id')->references('club_id')->on('club');
            $table->boolean('event_visibility');       //*public, members only
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
        Schema::dropIfExists('events');
    }
}
