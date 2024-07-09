<?php

namespace App\Http\Controllers;
use App\Models\Hostel;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Method to show all hostels
    public function index()
    {
        $hostels = Hostel::all();
        return view('admin.hostel.index', compact('hostels'));
    }

    // Method to show create hostel form
    public function createHostel()
    {
        return view('admin.hostel.create');
    }

    // Method to store a new hostel
    public function storeHostel(Request $request)
    {
        // Validate and store the hostel
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rooms' => 'required|integer'
        ]);

        Hostel::create($request->all());
        return redirect()->route('admin.hostel.index');
    }

    // Method to show edit hostel form
    public function editHostel($id)
    {
        $hostel = Hostel::findOrFail($id);
        return view('admin.hostel.edit', compact('hostel'));
    }

    // Method to update a hostel
    public function updateHostel(Request $request, $id)
    {
        // Validate and update the hostel
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rooms' => 'required|integer'
        ]);

        $hostel = Hostel::findOrFail($id);
        $hostel->update($request->all());
        return redirect()->route('admin.hostel.index');
    }

    // Method to delete a hostel
    public function destroyHostel($id)
    {
        $hostel = Hostel::findOrFail($id);
        $hostel->delete();
        return redirect()->route('admin.hostel.index');
    }

    // Method to show all users
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Method to show create user form
    public function createUser()
    {
        return view('admin.users.create');
    }

    // Method to store a new user
    public function storeUser(Request $request)
    {
        // Validate and store the user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        User::create($request->all());
        return redirect()->route('admin.users');
    }

    // Method to show edit user form
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Method to update a user
    public function updateUser(Request $request, $id)
    {
        // Validate and update the user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users');
    }

    // Method to delete a user
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }
}
