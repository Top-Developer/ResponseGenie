<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactIDToClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function(Blueprint $table){

            $table->integer('contact_id')->after('logo_path');

        });
        Schema::table('contacts', function(Blueprint $table){

            $table -> dropColumn('club_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function(Blueprint $table){

            $table->dropColumn('contact_id');

        });
        Schema::table('contacts', function(Blueprint $table){

            $table -> integer('club_id');

        });
    }
}
