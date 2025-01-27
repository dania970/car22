<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'name' => 'أحمد علي',
                'email' => 'ahmad@example.com',
                'subject' => 'استفسار عن سيارة',
                'message' => 'أود معرفة المزيد عن سيارة تسلا موديل S.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة محمد',
                'email' => 'fatima@example.com',
                'subject' => 'موعد صيانة',
                'message' => 'هل يمكنني حجز موعد لصيانة سيارتي؟',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سعيد الكيلاني',
                'email' => 'saeed@example.com',
                'subject' => 'معلومات الأسعار',
                'message' => 'كم سعر سيارة فورد موستانج؟',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'منى أحمد',
                'email' => 'mona@example.com',
                'subject' => 'استفسار عام',
                'message' => 'هل تقدمون تجربة قيادة للسيارات الجديدة؟',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد عبد الله',
                'email' => 'mohamed@example.com',
                'subject' => 'شكوى',
                'message' => 'أنا غير راضٍ عن التأخير في استلام سيارتي.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
