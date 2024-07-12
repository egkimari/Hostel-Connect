<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Prepare data to update
        $updateData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ];

        if (!empty($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }

      /*  // Update user profile using the update method
        $user->update($updateData); */

        // Redirect back with a success message
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
