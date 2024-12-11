<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolSeeder::class,
            IngredientSeeder::class,
            CakeSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            ClientCakeSeeder::class,
            OrderIngredientSeeder::class,
        ]);
    }
}
