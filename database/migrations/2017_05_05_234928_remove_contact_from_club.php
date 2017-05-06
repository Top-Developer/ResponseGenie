<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveContactFromClub extends Migration
{
    /**
     * Run the migrations.

     * @return void
     */
    public function up()
    {
        schema::table('clubs',function(Blueprint $table){
            $table -> dropColumn(['city','state','country','zipcode']);
            $table -> unsignedInteger('contact_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('clubs',function(Blueprint $table){
            $table -> string('city')->nullable()->default(null);
            $table -> string('state')->nullable()->default(null);
            $table -> string('country')->nullable()->default(null);
            $table -> string('zipcode')->nullable()->default(null);
            $table -> dropColumn('contact_id');
        });
    }
}
