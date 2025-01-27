<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all(); // Fetch all brands
        return view('admin.category', compact('brands')); // Pass brands to the Blade view
    }
    // Show the create brand form
    public function create()
    {
        return view('admin.add-category'); // Point to the Blade file for the form
    }

    // Store a new brand
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:brands|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('brands', 'public');
        }

        Brand::create([
            'name' => $request->input('name'),
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.add-category')->with('success', 'تم إضافة التصنيف بنجاح.');
    }
    public function edit($id)
    {
        $brand = Brand::findOrFail($id); // Fetch brand by ID or fail
        return view('admin.edit-category', compact('brand')); // Point to the edit Blade file
    }

    // Update a specific brand
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:brands,name,' . $brand->id . '|max:255', // Ensure name is unique excluding current brand
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $brand->image_path;

        if ($request->hasFile('image')) {
            // Delete old image if a new one is uploaded
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('image')->store('brands', 'public');
        }

        $brand->update([
            'name' => $request->input('name'),
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.category')->with('success', 'تم تعديل التصنيف بنجاح.');
    }

    // Delete a specific brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Delete associated image if exists
        if ($brand->image_path) {
            Storage::disk('public')->delete($brand->image_path);
        }

        $brand->delete();

        return redirect()->route('admin.category')->with('success', 'تم حذف التصنيف بنجاح.');
    }
}
