<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Usamos Faker para generar datos falsos

        // Insertar 10 órdenes con relaciones a otros modelos
        foreach (range(1, 10) as $index) {
            // Crear una nueva orden
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => rand(1, 10),   // Asociar con un usuario (ID aleatorio entre 1 y 10)
                'cake_id' => rand(1, 10),   // Asociar con un pastel (ID aleatorio entre 1 y 10)
                'delivery_date' => $faker->dateTimeBetween('now', '+1 month'), // Fecha de entrega aleatoria
                'order_status' => $faker->randomElement(['Pending', 'Completed', 'Shipped']), // Estado aleatorio
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Asociar ingredientes con la orden (relación muchos a muchos)
            $ingredientIds = [rand(1, 10), rand(1, 10), rand(1, 10)]; // Elegir 3 ingredientes aleatorios
            foreach ($ingredientIds as $ingredientId) {
                DB::table('order_ingredients')->insert([
                    'order_id' => $orderId,
                    'ingredient_id' => $ingredientId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Crear ClientCake para esta orden (si existe relación con ClientCake)
            DB::table('client_cakes')->insert([
                'user_id' => rand(1, 10),  // Usuario aleatorio
                'order_id' => $orderId,     // Asociar la orden
                'status' => $faker->randomElement(['Pending', 'Completed', 'Shipped']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
