<?php

namespace App\Http\Controllers;


use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'phone' => 'required|string',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'suburb' => 'required|string',
            'city' => 'nullable|string',
            'province' => 'required|string',
            'postal' => 'required|string',
            'user_type' => 'required|in:tenant,landlord', // Ensure user type is either tenant or landlord
            'user_id' => 'required|exists:users,id', // Validate that user exists
        ]);

        // Create a new profile and associate it with the user
        $userProfile = UserProfile::create([
            'user_id' => $validated['user_id'], // Ensure the user ID is associated
            'phone' => $validated['phone'],
            'address1' => $validated['address1'],
            'address2' => $validated['address2'],
            'suburb' => $validated['suburb'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'postal' => $validated['postal'],
            'user_type' => $validated['user_type'],
        ]);

        // Optionally, return a response
        return response()->json(['message' => 'Profile created successfully!', 'profile' => $userProfile]);
    }
    /**
     * Display the specified resource.
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
