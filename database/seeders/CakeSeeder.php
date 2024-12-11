<?php

namespace Database\Seeders;

use App\Models\Cake;
use Illuminate\Database\Seeder;

class CakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cake::firstOrCreate([
            'name' => 'Chocolate Cake',
            'size' => 'Medium',
            'image' => 'chocolate_cake.jpg',
        ]);
        
        Cake::firstOrCreate([
            'name' => 'Vanilla Cake',
            'size' => 'Small',
            'image' => 'vanilla_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Strawberry Cake',
            'size' => 'Large',
            'image' => 'strawberry_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Red Velvet Cake',
            'size' => 'Medium',
            'image' => 'red_velvet_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Lemon Cake',
            'size' => 'Small',
            'image' => 'lemon_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Carrot Cake',
            'size' => 'Large',
            'image' => 'carrot_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Cheesecake',
            'size' => 'Medium',
            'image' => 'cheesecake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Pineapple Cake',
            'size' => 'Small',
            'image' => 'pineapple_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Coconut Cake',
            'size' => 'Large',
            'image' => 'coconut_cake.jpg',
        ]);

        Cake::firstOrCreate([
            'name' => 'Mango Cake',
            'size' => 'Medium',
            'image' => 'mango_cake.jpg',
        ]);
    }
}
