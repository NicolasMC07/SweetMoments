<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Usamos Faker para generar datos aleatorios

        // Insertar un usuario con el rol 'Admin'
        DB::table('users')->insert([
            'role_id' => 1, // Asumiendo que el rol 'Admin' tiene el ID 1
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Contraseña encriptada
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insertar usuarios con el rol 'Client' (5 usuarios por ejemplo)
        foreach (range(1, 5) as $index) {
            DB::table('users')->insert([
                'role_id' => 2, // Asumiendo que el rol 'Client' tiene el ID 2
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Contraseña encriptada
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
