<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show the profile form
    public function index()
    {
        return view('landlord.profile', ['user' => Auth::user()]);
    }

    // Handle form submission for profile update
    public function update(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

       
        /* Prepare data to update
        $updateData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ];

        // Update the password if it's provided
        if (!empty($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }

        // Update user profile using the update method
        $user->update($updateData);
        */

        // Redirect with success message
        return redirect()->route('landlord.profile')->with('success', 'Profile updated successfully.');
    }

}
