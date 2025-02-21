<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::latest()->take(10)->get();
        return view('welcome', compact('listings'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_name' => 'required|string',
            'property_type' => 'required|string',
            'description' => 'nullable|string',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'nullable|integer|min:0',
            'size' => 'required|integer|min:1',
            'amenities' => 'nullable|array',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'suburb' => 'required|string',
            'city' => 'nullable|string',
            'province' => 'required|string',
            'postal' => 'required|string',
            'available_date' => 'nullable|date',
            'price' => 'required|numeric|min:0',
            'images' => 'nullable|array', // Validate images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow specific image formats
        ]);

        $validated['user_id'] = Auth::id(); // Automatically assign the logged-in user
        $validated['amenities'] = json_encode($request->amenities); // Store amenities as JSON

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                // Store the image in the 'public/images' directory
                $path = $image->store('images', 'public');
                $imagePaths[] = $path; // Save each image path
            }
            $validated['images'] = $imagePaths; // Store image paths as an array (no need to encode as JSON)
        }

        // Create the listing with validated data
        Listing::create($validated);

        return back()->with('success', 'Listing created successfully!');
    }
}
