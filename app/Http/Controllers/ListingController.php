<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index()
    {
        // Fetch all listings
        $listings = Listing::all();

        // Pass data to the view
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
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['user_id'] = Auth::id(); // Automatically assign the logged-in user
        $validated['amenities'] = json_encode($request->amenities); // Store amenities as JSON

        // Handle image uploads
        foreach (range(1, 6) as $i) {
            $imageField = 'image' . $i;
            if ($request->hasFile($imageField)) {
                // Store the image in the 'listing_img' directory
                $path = $request->file($imageField)->storeAs('images', $request->file($imageField)->getClientOriginalName(), 'public');
                $validated[$imageField] = $path; // Store each image path in its respective field
            }
        }

        // Create the listing with validated data
        Listing::create($validated);

        return back()->with('success', 'Listing created successfully!');
    }

}
