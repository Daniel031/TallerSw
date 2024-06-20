<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Ropa de niños',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pañales Tallas pequeñas',
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Comestibles',
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Zapatos de Niñas',
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'name' => 'Zapatos de Niños',
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            // Agrega más centros según sea necesario
        ]);
    }
}
