<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypologiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(TypologyUserTableSeeder::class);
    }
}
