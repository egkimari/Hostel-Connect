@extends('frontend.layout')

@section('title', 'Home - HostelConnect')

@section('styles')
<style>
    /* Welcome section styles */
    .welcome-section {
        background-image: url('{{ asset("Images/background.jpg") }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .welcome-section h1 {
        font-family: 'Times New Roman', serif;
        font-size: 36px;
        color: #fff;
        text-align: center;
        margin: 0;
    }

    /* Feature highlights section styles */
    .feature-highlights {
        padding: 20px;
    }

    .carousel-inner img {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    /* Find a hostel section styles */
    .find-hostel {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .find-hostel h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    /* Manage bookings section styles */
    .manage-bookings {
        padding: 20px;
        background-color: #e9ecef;
    }

    .manage-bookings h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    /* Footer styles */
    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    footer .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    footer p {
        margin: 0;
    }

    footer .social-icons {
        margin-top: 10px;
    }

    .social-icons a {
        color: #fff;
        margin: 0 10px;
        text-decoration: none;
    }

    .social-icons a:hover {
        color: #ccc;
    }

    /* Header styles */
    header {
        background-color: #f8f9fa;
        padding: 10px 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    header .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    header h1 {
        font-family: 'Times New Roman', serif;
        font-size: 30px;
        margin-bottom: 10px;
    }

    header nav {
        margin-top: 10px;
    }

    header nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px;
    }

    header nav ul li {
        margin: 0;
    }

    header nav ul li a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    header nav ul li a:hover {
        color: #007bff;
    }

    /* Additional general styles */
    body {
        background-color: #f8f9fa;
        color: #333;
    }

    .dark-bg {
        background-color: #343a40;
        color: #fff;
    }

    .card-deck .card {
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .card-deck .card-body {
        padding: 20px;
    }

    .navbar-nav .nav-link {
        color: #555;
    }

    .navbar-nav .nav-link.active {
        font-weight: bold;
        color: #000;
    }
</style>
@endsection

@section('content')
<section id="home" class="welcome-section">
    <div class="container">
        <div class="main-content text-center text-white">
            <h1>Welcome to HostelConnect</h1>
            <p>The Ultimate Hostel Solution To Your Housing Problem</p>
        </div>

        <div class="card-deck mt-4">
            <div class="card">
              <a href="{{ route('hostels.index') }}" class="card-link">
                    <div class="card-body text-center">
                        <h3 class="card-title">Find a Hostel</h3>
                        <p class="card-text">Browse through our extensive list of hostels and find the one that suits your needs.</p>
                    </div>
                </a>
            </div>

            <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Manage Your Bookings</h3>
                        <p class="card-text">Keep track of your bookings and payments easily through our user-friendly interface.</p>
                    </div>
                </a>
            </div>
        </div>
    

        <!-- Display featured hostels -->
        @if($hostels->count())
            <div class="mt-5">
                <h3 class="text-center">Featured Hostels</h3>
                <div class="row">
                    @foreach($hostels as $hostel)
                        <div class="col-md-4">
                            <div class="card">
                                @if($hostel->image)
                                    <img class="card-img-top" src="{{ asset($hostel->image) }}" alt="{{ $hostel->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $hostel->name }}</h5>
                                    <p class="card-text">{{ $hostel->description }}</p>
                                    <a href="{{ route('hostels.show', $hostel->id) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center">No hostels available at the moment.</p>
        @endif
    </div>
</section>
@endsection
