<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $name, 'public'); // Save to storage/app/public/images
    
                Image::create([
                    'related_id' => 1, // Example related model ID
                    'image_path' => $path,
                ]);
            }
        }
    
        return back()->with('success', 'Images uploaded successfully!');
    }   
}

