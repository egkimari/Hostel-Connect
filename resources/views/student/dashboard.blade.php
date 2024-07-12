@extends('frontend.layout')

@section('title', 'Student Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Student Dashboard</h1>
    <p>Welcome to your dashboard, {{ Auth::user()->name }}.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Browse Hostels</h5>
                    <p class="card-text">Find and view available hostels for your stay.</p>
                    <a href="{{ route('student.hostels.index') }}" class="btn btn-primary">Browse Hostels</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Bookings</h5>
                    <p class="card-text">View and manage your hostel bookings.</p>
                    <a href="{{ route('student.bookings.index') }}" class="btn btn-primary">Manage Bookings</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <p class="card-text">Update your profile information.</p>
                    <a href="{{ route('student.profile') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
