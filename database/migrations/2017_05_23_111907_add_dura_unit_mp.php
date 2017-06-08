<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDuraUnitMp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membership_plans', function(Blueprint $table){
            $table -> string('duration_unit');
            $table -> string('duration_quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membership_plans', function(Blueprint $table){
            $table -> dropColumn('duration_unit');
            $table -> dropColumn('duration_quantity');
        });
    }
}
