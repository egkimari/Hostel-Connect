<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('landlord.profile');
    }

    public function update(Request $request)
    {
        // Update profile logic here
    }
}
