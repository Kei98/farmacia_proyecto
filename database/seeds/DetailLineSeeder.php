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
            "id_drug" => "2",
            "amount" => "7",
            "subtotal" => "350",

        ]);
        DB::table('detail_lines')->insert([
            "id_drug" => "1",
            "amount" => "10",
            "subtotal" => "2850"
        ]);
    }
}

