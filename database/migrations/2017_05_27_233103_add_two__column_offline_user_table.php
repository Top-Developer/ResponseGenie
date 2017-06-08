<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnOfflineUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offline_club_member', function($table){

            $table -> dateTime('joinDate');
            $table -> dateTime('expDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offline_club_member', function(Blueprint $table){
            $table -> dropColumn('joinDate');
            $table -> dropColumn('expDate');
        });
    }
}
