<?php

use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
            "amount" => "1000",
            "id_drug" => "1"
        ]);
        DB::table('inventories')->insert([
            "amount" => "700",
            "id_drug" => "2"
        ]);
    }
}
