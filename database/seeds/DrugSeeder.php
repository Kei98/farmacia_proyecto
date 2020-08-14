<?php

use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drugs')->insert([
            "name" => "Paracetamol 500mg",
            "description" => "Aliquam tempor enim at pulvinar pretium. Sed nec ex justo. Integer iaculis gravida tempor. Praesent nec augue non erat placerat imperdiet sed eu ante. Donec sollicitudin nisi elit, eu facilisis leo congue in.",
            "administration" => "oral",
            "price" => "50",
            "id_provider" => "1"
        ]);
        DB::table('drugs')->insert([
            "name" => "Corisan 408mg",
            "description" => "Fusce convallis mauris nisi, in posuere ex hendrerit efficitur. Mauris eleifend aliquet nibh, sed dignissim metus faucibus fermentum. Vestibulum ut dui tortor.",
            "administration" => "oral",
            "price" => "285",
            "id_provider" => "1"
        ]);
    }
}
