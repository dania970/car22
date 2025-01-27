<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
protected $fillable = ['car_id', 'image_path']; // اكتب أسماء الأعمدة القابلة للتعبئة

    // علاقة متعدد إلى واحد
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    
}
