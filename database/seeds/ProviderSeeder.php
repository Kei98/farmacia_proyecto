<?php

use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            "name" => "1000",
            "phone_number" => "+50687568143",
            "id_company" => "1"
        ]);
    }
}
