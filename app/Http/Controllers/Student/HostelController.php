<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        return view('student.hostels.index');
    }

    public function show($id)
    {
        return view('student.hostels.show', compact('id'));
    }
}
