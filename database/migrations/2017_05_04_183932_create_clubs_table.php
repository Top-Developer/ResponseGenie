<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable()->default(null);
            $table->string('description');
            $table->string('short_description')->nullable()->default(null);
            $table->string('website')->nullable()->default(null);
            $table->string('facebook_page')->nullable()->default(null);
            $table->string('logo_path')->nullable()->default(null);
            $table->string('phone_number')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('zipcode')->nullable()->default(null);
            $table->string('membership_limit')->nullable()->default(null);
            $table->string('stripe_pvt_key')->nullable()->default(null);
            $table->string('stripe_pub_key')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('welcome_msg')->nullable()->default(null);
            $table->string('renewal_msg')->nullable()->default(null);
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
        Schema::dropIfExists('clubs');
    }
}
