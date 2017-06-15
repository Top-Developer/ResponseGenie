<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnReceiptToTrPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_for_mplan', function($table){

            $table->string('receipt');
            $table->integer('user_id') -> change();
            $table->integer('plan_id') -> change();
            $table->float('amount') -> change();
            $table->date('date') -> change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_for_mplan', function(Blueprint $table){
            $table -> dropColumn('receipt');
        });
    }
}
