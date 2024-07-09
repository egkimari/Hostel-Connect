<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $hostelCount = Hostel::count();
        $userCount = User::count();
        $recentHostels = Hostel::latest()->take(5)->get();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('hostelCount', 'userCount', 'recentHostels', 'recentUsers'));
    }
}
