<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('centers')->insert([
            [
                'name' => 'Centro 1 Padre Alfredo',
                'description' => 'Hogar de niños y niñas huerfanos',
                'address' => 'Avenidad Centenario Call 5',
                'state' => 'true',
                'location'=> '-17.789714421352407, -63.18250884101073',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Centro 1 Tesera de Los Andes',
                'description' => 'Hogar de niños ',
                'address' => 'Cotoca Km 21',
                'state' => 'true',
                'location'=> '-17.755704192341362, -62.98411508786285',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
