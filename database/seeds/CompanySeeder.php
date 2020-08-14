<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            "name" => "Tricell",
            "phone_number" => "+50624785148",
            "legal_id" => "97182390",
            "address" => "50m este del parque de San Ramón"
        ]);
    }
}
