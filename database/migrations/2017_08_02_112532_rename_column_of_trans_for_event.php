<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnOfTransForEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_for_cevent', function(Blueprint $table){
           $table->renameColumn('event_id', 'event_price_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_for_cevent', function(Blueprint $table){
            $table->renameColumn('event_price_id', 'event_id');
        });
    }
}
