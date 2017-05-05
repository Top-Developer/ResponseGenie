<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_discount', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->integer('club_id');
            $table->float('discount_amount', 8, 2);
            $table->integer('discount_off');     //1=$ off, 2=% off
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
        Schema::dropIfExists('club_discount');
    }
}
