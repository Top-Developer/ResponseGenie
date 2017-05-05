<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('rate_id')->references('rate_id')->on('rate');
            $table->integer('offline_club_member_id')->references('id')->on('offline_club_member');   //*if manual payment, should ben tied to club member who isnt site membeer
            $table->date('transaction_date');
            $table->integer('transaction_status');
            $table->integer('payment_source');                          //1=paypal, 2=Stripe, 3=manual entry
            $table->integer('transaction_number');
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
        Schema::dropIfExists('transactions');
    }
}
