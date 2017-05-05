<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_fields', function (Blueprint $table) {
            $table->increments('field_id');
            $table->string('field_name', 128);
            $table->string('field_description', 255);
            $table->integer('club_id')->references('club_id')->on('club');
            $table->boolean('display_type');        //**show last entry, show all entries
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
        Schema::dropIfExists('special_fields');
    }
}
