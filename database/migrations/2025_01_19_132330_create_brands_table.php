<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Unique brand name
            $table->string('image_path')->nullable(); // Image path column
            $table->timestamps();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->after('id'); // Foreign key column
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->dropColumn('brand'); // Remove the old brand column
        });
    }

    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('brand')->after('name'); // Add the old brand column back
            $table->dropForeign(['brand_id']); // Drop the foreign key constraint
            $table->dropColumn('brand_id'); // Drop the foreign key column
        });

        Schema::dropIfExists('brands');
    }
};
