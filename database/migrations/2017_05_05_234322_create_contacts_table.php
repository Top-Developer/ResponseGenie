<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zipcode')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('linkedin')->nullable()->default(null);
            $table->string('level_in')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('level_t')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('level_f')->nullable()->default(null);
            $table->string('youtube')->nullable()->default(null);
            $table->string('level_y')->nullable()->default(null);
            $table->string('googleplus')->nullable()->default(null);
            $table->string('level_g')->nullable()->default(null);
            $table->string('mail')->nullable()->default(null);
            $table->string('level_m')->nullable()->default(null);
            $table->string('pcm_id')->nullable()->default(null);
            $table->string('scm_id')->nullable()->default(null);
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
        Schema::dropIfExists('contacts');
    }
}
