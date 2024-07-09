<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        return view('hostels.index', compact('hostels'));
    }

    public function create()
    {
        return view('hostels.create');
    }

    public function store(Request $request)
    {
        $hostel = new Hostel($request->all());
        $hostel->user_id = auth()->id();
        $hostel->save();
        return redirect()->route('hostels.index');
    }

    public function show($id)
    {
        $hostel = Hostel::findOrFail($id);
        return view('hostels.show', compact('hostel'));
    }
}
