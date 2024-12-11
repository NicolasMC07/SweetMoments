<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderIngredientSeeder extends Seeder
{
    public function run()
    {
        // Definir el número de registros que queremos insertar
        $totalOrderIngredients = 30; // Total de asociaciones entre órdenes e ingredientes

        // Insertar registros en la tabla pivot `order_ingredients`
        foreach (range(1, $totalOrderIngredients) as $index) {
            // Elegir aleatoriamente un `order_id` entre las órdenes existentes (asumimos que hay órdenes con `id` entre 1 y 10)
            $orderId = rand(1, 10);

            // Elegir aleatoriamente un `ingredient_id` entre los ingredientes existentes (asumimos que hay ingredientes con `id` entre 1 y 10)
            $ingredientId = rand(1, 10);

            // Insertar la relación en la tabla `order_ingredients`
            DB::table('order_ingredients')->insert([
                'order_id' => $orderId,
                'ingredient_id' => $ingredientId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
