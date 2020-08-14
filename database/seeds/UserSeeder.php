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

        DB::table('users')->insert([
            "utype" => "staff",
            "name" => "staff",
            "email" => "staff@staff.com",
            "id_person" => "608730142",
            "telephone" => "+50689642751",
            "password" => bcrypt("23456789")
        ]);

        DB::table('users')->insert([
            "utype" => "client",
            "name" => "client",
            "email" => "client@client.com",
            "id_person" => "107530571",
            "telephone" => "+50663593260",
            "password" => bcrypt("34567890")
        ]);

    }
}
