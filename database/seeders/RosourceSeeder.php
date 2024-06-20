<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

 
class RosourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'url' => 'https://res.cloudinary.com/dirau81x6/image/upload/v1718912233/images_hobpfy.png',
                'center_id' => 1,
                'type_resource' => 'I',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'url' => 'https://res.cloudinary.com/dirau81x6/image/upload/v1718912205/foto-hogar-teresa-de-los-andes_1811618994_1140x520_UN410469_MG172678844_yceyli.jpg',
                'center_id' => 2,
                'type_resource' => 'I',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'url' => 'https://res.cloudinary.com/dirau81x6/image/upload/v1718912233/images_hobpfy.png',
                'center_id' => 1,
                'type_resouce' => 'I',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'url' => 'https://res.cloudinary.com/dirau81x6/image/upload/v1718912205/foto-hogar-teresa-de-los-andes_1811618994_1140x520_UN410469_MG172678844_yceyli.jpg',
                'center_id' => 2,
                'type_resource' => 'I',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('resources')->insert($items);
    }
}
