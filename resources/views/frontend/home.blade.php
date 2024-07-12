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
