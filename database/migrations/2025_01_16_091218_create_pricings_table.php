<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_type');
            $table->decimal('price', 10, 2); // سعر السيارة
            $table->string('whatsapp_number')->nullable(); // رقم الواتساب
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricings');
    }
}
