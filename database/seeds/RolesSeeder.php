<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['role_description' => 'special']);
        DB::table('roles')->insert(['role_description' => 'owner']);
        DB::table('roles')->insert(['role_description' => 'admin']);
        DB::table('roles')->insert(['role_description' => 'member']);
        DB::table('roles')->insert(['role_description' => 'invited']);
    }
}
