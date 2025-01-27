<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('car_id'); // مفتاح خارجي للإشارة إلى جدول السيارات
        $table->string('image_path'); // مسار الصورة
        $table->timestamps();

        // تعريف المفتاح الخارجي
        $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
