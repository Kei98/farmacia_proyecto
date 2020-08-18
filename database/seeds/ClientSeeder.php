<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            "name" => "client",
            "id_person" => "107530571",
            "tel_number" => "+50663593260"
        ]);

    }
}
