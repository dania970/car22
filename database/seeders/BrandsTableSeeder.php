<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            [
                'name' => 'تويوتا',
                'image_path' => null, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'هوندا',
                'image_path' => null, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فورد',
                'image_path' => null, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تسلا',
                'image_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'هيونداي',
                'image_path' => null, // الصورة غير محددة
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
