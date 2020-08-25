<?php

use Illuminate\Database\Seeder;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale_details')->insert([
            "id_sale" => "1",
            "id_detail_line" => "1"
        ]);
        DB::table('sale_details')->insert([
            "id_sale" => "1",
            "id_detail_line" => "2"
        ]);
    }

}
