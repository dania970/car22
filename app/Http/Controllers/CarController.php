<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Image;
use App\Models\Brand;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('images', 'brand')->paginate(10); // Fetch cars with their images and brand relationship
    $brands = Brand::all(); // Fetch all brands to display in the filter

    return view('car', compact('cars', 'brands'));
    }




    public function show($id)
    {
        // Retrieve the car with its associated images and brand
        $carSingle = Car::with(['images', 'brand'])->findOrFail($id);

        // Fetch related cars that belong to the same brand and exclude the current car
        $relatedCars = Car::where('brand_id', $carSingle->brand_id)
                          ->where('id', '!=', $id)
                          ->with('images')
                          ->get();
        // dd($carSingle->images);
        // Return the view with the car details and related cars
        return view('car-single', compact('carSingle', 'relatedCars'));
    }


// public function show($id)
// {
//     $carSingle = Car::find($id); // Attempt to find the car by its ID

//     if (!$carSingle) {
//         // Handle the case where the car is not found (e.g., return a 404 response)
//         abort(404, 'Car not found');
//     }



    // عرض صفحة إضافة سيارة جديدة
    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }
}
