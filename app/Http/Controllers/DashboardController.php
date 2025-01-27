<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Brand;
use App\Models\Image;

use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $carCount = Car::count();
        $brandCount = Car::distinct('brand_id')->count('brand_id');
        return view('admin.home', compact('carCount', 'brandCount'));
    }

    public function getCars()
    {
        $cars = Car::with(['images', 'brand'])->get();
        return view('admin.cars', compact('cars'));
    }

    public function getEmails()
    {
        $contacts = Contact::paginate(10);

        return view('admin.emails', compact('contacts'));
    }
    public function deleteEmail($id)
    {
        logger("Delete method triggered with ID: " . $id);

        // Check if the ID is being passed correctly
        if (!$id) {
            logger("No ID provided");
            abort(404);
        }

        // Attempt to find the contact
        $contact = Contact::find($id);
        if (!$contact) {
            logger("No contact found with ID: " . $id);
            abort(404, "Contact not found");
        }

        // Attempt to delete the contact
        try {
            $contact->delete();
            logger("Contact deleted successfully: " . $id);
        } catch (\Exception $e) {
            logger("Error deleting contact: " . $e->getMessage());
            return redirect()->back()->withErrors("Unable to delete contact");
        }

        return redirect()->route('admin.contacts')->with('success', 'تم حذف الرسالة بنجاح.');
    }
    public function editCar($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        return view('admin.edit-car', compact('car', 'brands'));
    }


public function deleteCar($id)
{
    $car = Car::findOrFail($id); // Find the car by ID
    $car->images()->delete(); // Delete associated images
    $car->delete(); // Delete the car itself
    return redirect()->route('admin.cars')->with('success', 'تم حذف السيارة بنجاح.');
}


public function updateCar(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $car = Car::findOrFail($id);
    $car->update($request->only(['name', 'description', 'price']));

    // حذف الصور التي تم اختيارها لحذفها
    if ($request->has('delete_images')) {
        foreach ($request->delete_images as $imageId) {
            $image = Image::find($imageId);
            if ($image) {
                Storage::disk('public')->delete($image->image_path); // حذف الصورة من التخزين
                $image->delete(); // حذف السجل من قاعدة البيانات
            }
        }
    }

    // التعامل مع الصور الجديدة
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('cars', 'public');
            $car->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('admin.cars')->with('success', 'تم تحديث السيارة بنجاح.');
}




public function createCar()
{
    $brands = Brand::all();
    return view('admin.add-car', compact('brands'));
}

public function storeCar(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'year' => 'required|numeric|min:1900|max:' . date('Y'),
        'brand_id' => 'required|exists:brands,id',
        'price' => 'required|numeric|min:0',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $car = Car::create($request->only(['name', 'description', 'year', 'brand_id', 'price']));

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('cars', 'public');
            $car->images()->create(['image_path' => $path]);
        }
    }

    return redirect()->route('admin.cars')->with('success', 'تم إضافة السيارة بنجاح.');
}




}
