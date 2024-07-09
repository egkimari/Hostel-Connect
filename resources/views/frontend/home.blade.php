<!-- resources/views/frontend/home.blade.php -->
@extends('frontend.layout')

@section('title', 'Home - HostelConnect')

@section('content')
<section id="home" class="dark-bg">
    <div class="container">
        <div class="main-content text-center">
            <h2>Welcome to HostelConnect</h2>
            <p>The Ultimate Hostel Solution To Your Housing Problem</p>
        </div>

        <div class="card-deck mt-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Find a Hostel</h3>
                    <p class="card-text">Browse through our extensive list of hostels and find the one that suits your needs.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Manage Your Bookings</h3>
                    <p class="card-text">Keep track of your bookings and payments easily through our user-friendly interface.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
