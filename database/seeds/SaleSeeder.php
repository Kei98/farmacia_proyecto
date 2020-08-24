<?php

use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            "date" => "13/08/2020",
            "discount" => "0",
            "tax" => "200",
            "final_amount" => "3400",
            "id_staff" => "2",
            "id_client" => "1"
        ]);
    }
}
