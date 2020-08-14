<?php

use Illuminate\Database\Seeder;

class DetailLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_lines')->insert([
            "drug_name" => "Paracetamol 500mg",
            "drug_price" => "50",
            "amount" => "7",
            "subtotal" => "350",
            "id_sale" => "1",
            "id_drug" => "1"
        ]);
        DB::table('detail_lines')->insert([
            "drug_name" => "Corisan 408mg",
            "drug_price" => "285",
            "amount" => "10",
            "subtotal" => "2850",
            "id_sale" => "1",
            "id_drug" => "2"
        ]);
    }
}

