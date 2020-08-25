<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            CompanySeeder::class,
            ProviderSeeder::class,
            DrugSeeder::class,
            InventorySeeder::class,
            SaleSeeder::class,
            DetailLineSeeder::class,
            SaleDetailSeeder::class
        ]);
    }
}
