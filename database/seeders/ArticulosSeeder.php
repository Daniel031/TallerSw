<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'name' => 'Polera de niño',
                'description' => 'Polera de niño de algodón, varias tallas disponibles.',
                'type_article' => 1,
                'category_id' => 1, // Suponiendo que la categoría 1 es "Ropa"
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pañales talla S',
                'description' => 'Pañales desechables talla S, paquete de 40 unidades.',
                'type_article' => 1,
                'category_id' => 2, // Suponiendo que la categoría 2 es "Pañales"
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Juguete educativo',
                'description' => 'Juguete educativo para estimular la creatividad y el aprendizaje.',
                'type_article' => 1,
                'category_id' => 3, // Suponiendo que la categoría 3 es "Juguetes"
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Zapatos de niño',
                'description' => 'Zapatos cómodos y duraderos para niños, varias tallas disponibles.',
                'type_article' => 1,
                'category_id' => 1,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pañales talla M',
                'description' => 'Pañales desechables talla M, paquete de 40 unidades.',
                'type_article' => 1,
                'category_id' => 2,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Juguete musical',
                'description' => 'Juguete musical para niños, ayuda a desarrollar habilidades auditivas.',
                'type_article' => 1,
                'category_id' => 3,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chaqueta de niño',
                'description' => 'Chaqueta abrigadora para niños, varias tallas disponibles.',
                'type_article' => 1,
                'category_id' => 1,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pañales talla L',
                'description' => 'Pañales desechables talla L, paquete de 40 unidades.',
                'type_article' => 1,
                'category_id' => 2,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Libro de cuentos',
                'description' => 'Libro de cuentos infantiles con ilustraciones coloridas.',
                'type_article' => 1,
                'category_id' => 3,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Guantes de niño',
                'description' => 'Guantes abrigadores para niños, varias tallas disponibles.',
                'type_article' => 1,
                'category_id' => 1,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pañales talla XL',
                'description' => 'Pañales desechables talla XL, paquete de 40 unidades.',
                'type_article' => 1,
                'category_id' => 2,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Peluche',
                'description' => 'Peluche suave y seguro para niños pequeños.',
                'type_article' => 1,
                'category_id' => 3,
                'center_id' => 1,
                'state' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('articles')->insert($articles);
        
    }
}
