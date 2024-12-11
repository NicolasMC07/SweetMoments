<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear los roles 'admin' y 'client' si no existen
        Rol::firstOrCreate(['name' => 'admin']);
        Rol::firstOrCreate(['name' => 'client']);
    }
}
