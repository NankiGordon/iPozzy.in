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
        // Validate the incoming request data
        $validated = $request->validate([
            'phone' => 'required|string',
            // 'address1' => 'required|string',
            // 'address2' => 'nullable|string',
            // 'suburb' => 'required|string',
            // 'city' => 'nullable|string',
            // 'province' => 'required|string',
            // 'postal' => 'required|string',
            // 'user_type' => 'required|in:tenant,landlord',
            'user_id' => 'required|exists:users,id', // Validate that user exists
        ]);

        // Create a new profile in the database
        UserProfile::create($validated);

        return back()->with('success', 'Profile saved successfully!');
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
