<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Car;

use Illuminate\Http\Request;

class PricingController extends Controller
{

    public function index()
    {
        // جلب السيارات مع الصورة الأولى فقط
        $pricings = Car::with('images')->paginate(10); // جلب السيارات مع الصور المرتبطة
        return view('pricing', compact('pricings'));
    }



    // لإضافة سعر جديد
    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required|string',
            'car_type' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Pricing::create([
            'car_name' => $request->car_name,
            'car_type' => $request->car_type,
            'price' => $request->price,
        ]);

        return redirect()->route('pricing.index');
    }
}
