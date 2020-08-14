<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "utype" => "admin",
            "name" => "admin",
            "email" => "admin@admin.com",
            "id_person" => "209860413",
            "telephone" => "+50672347075",
            "password" => bcrypt("12345678")
        ]);
    }
}
