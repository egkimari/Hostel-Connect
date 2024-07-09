<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        // Payment processing logic here
    }

    public function show($id)
    {
        // Show payment details
    }
}
