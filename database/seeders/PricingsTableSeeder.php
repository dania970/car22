<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pricings')->insert([
            [
                'car_name' => 'تويوتا كورولا',
                'car_type' => 'سيدان',
                'price' => 23000.00,
                'whatsapp_number' => '1234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_name' => 'هوندا سيفيك',
                'car_type' => 'سيدان',
                'price' => 25000.00,
                'whatsapp_number' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_name' => 'تسلا موديل S',
                'car_type' => 'كهربائية',
                'price' => 79999.99,
                'whatsapp_number' => '1231231234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_name' => 'فورد موستانج',
                'car_type' => 'عضلات',
                'price' => 55000.00,
                'whatsapp_number' => '9876543210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_name' => 'بورشه 911 كاريرا',
                'car_type' => 'رياضية',
                'price' => 105000.00,
                'whatsapp_number' => '4567890123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}