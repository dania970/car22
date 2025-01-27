<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        // جلب معرفات العلامات التجارية
        $toyotaId = Brand::where('name', 'تويوتا')->first()->id ?? null;
        $hondaId = Brand::where('name', 'هوندا')->first()->id ?? null;
        $fordId = Brand::where('name', 'فورد')->first()->id ?? null;

        if ($toyotaId && $hondaId && $fordId) {
            // إدخال سيارات تجريبية
            DB::table('cars')->insert([
                [
                    'name' => 'تويوتا كورولا',
                    'brand_id' => $toyotaId,
                    'year' => 2021,
                    'price' => 20000.00,
                    'description' => 'سيارة سيدان موثوقة وموفرة للوقود.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'هوندا سيفيك',
                    'brand_id' => $hondaId,
                    'year' => 2022,
                    'price' => 22000.00,
                    'description' => 'سيارة مدمجة أنيقة وقوية.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'فورد F-150',
                    'brand_id' => $fordId,
                    'year' => 2023,
                    'price' => 30000.00,
                    'description' => 'شاحنة بيك أب متينة ومتعددة الاستخدامات.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        } else {
            // تسجيل خطأ إذا كانت العلامات التجارية غير موجودة
            logger('خطأ: بعض العلامات التجارية مفقودة. يُرجى تشغيل BrandsTableSeeder أولاً.');
        }
    }
}