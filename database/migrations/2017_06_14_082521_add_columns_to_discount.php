<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount', function($table){

            $table->string('name');
            $table->string('type');
            $table->string('amount');
            $table->date('expDate');
            $table->string('applyTo');
            $table->string('uses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('memberships', function(Blueprint $table){

            $table -> dropColumn('name');
            $table -> dropColumn('type');
            $table -> dropColumn('amount');
            $table -> dropColumn('expDate');
            $table -> dropColumn('applyTo');
            $table -> dropColumn('uses');
        });
    }
}
