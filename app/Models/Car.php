<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_id', 'year', 'price', 'description'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
