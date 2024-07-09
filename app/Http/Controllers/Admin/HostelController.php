<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    //
    public function index()
    {
        $hostels = Hostel::all();
        return view('admin.hostels.index', compact('hostels'));
    }

    public function create()
    {
        return view('admin.hostels.create');
    }

    public function store(Request $request)
    {
        // Validation and storing logic
    }

    public function edit(Hostel $hostel)
    {
        return view('admin.hostels.edit', compact('hostel'));
    }

    public function update(Request $request, Hostel $hostel)
    {
        // Validation and updating logic
    }

    public function destroy(Hostel $hostel)
    {
        $hostel->delete();
        return redirect()->route('admin.hostels.index');
    }
}
