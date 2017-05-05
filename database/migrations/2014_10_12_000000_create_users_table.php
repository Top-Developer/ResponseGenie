<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->string('zip');
            $table->string('email')->unique();
            $table->string('email_validation')->nullable();
            $table->string('password');
            $table->boolean('is_admin');
            $table->string('provider')->nullable();
            $table->string('provider_id', 255)->nullable();
            $table->string('profile_image')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
