<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        return view('landlord.hostels.index');
    }

    public function show($id)
    {
        return view('landlord.hostels.show', compact('id'));
    }
}
