<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        // Insertar 10 ingredientes
        $ingredients = [
            'Flour',
            'Sugar',
            'Butter',
            'Eggs',
            'Milk',
            'Vanilla',
            'Chocolate',
            'Baking Powder',
            'Salt',
            'Cocoa Powder',
        ];

        foreach ($ingredients as $ingredientName) {
            // Insertar el ingrediente
            $ingredient = DB::table('ingredients')->insertGetId([
                'name' => $ingredientName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Asociar el ingrediente con 3 órdenes de ejemplo
            $orderIds = [1, 2, 3]; // Aquí puedes agregar los IDs de las órdenes que desees asociar
            foreach ($orderIds as $orderId) {
                DB::table('order_ingredients')->insert([
                    'ingredient_id' => $ingredient,
                    'order_id' => $orderId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
