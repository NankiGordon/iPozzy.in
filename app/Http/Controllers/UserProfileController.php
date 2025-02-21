<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'phone' => 'required|string',
            // Uncomment these if needed
            // 'address1' => 'required|string',
            // 'address2' => 'nullable|string',
            // 'suburb' => 'required|string',
            // 'city' => 'nullable|string',
            // 'province' => 'required|string',
            // 'postal' => 'required|string',
            // 'user_type' => 'required|in:tenant,landlord',
        ]);

        // Assign the authenticated user's ID
        $validated['user_id'] = Auth::id();

        // Create a new profile in the database
        UserProfile::create($validated);

        return redirect()->back()->with('success', 'Profile saved successfully!');
    }
}
