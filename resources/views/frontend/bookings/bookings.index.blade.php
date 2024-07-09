@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Bookings</h1>
    <!-- Link to add new booking -->
    <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add New Booking</a>
    
    <!-- Displaying bookings in a row -->
    <div class="row">
        @foreach($bookings as $booking)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Booking #{{ $booking->id }}</h5>
                        <p class="card-text">Hostel: {{ $booking->hostel->name }}</p> <!-- Display hostel name -->
                        <p class="card-text">Status: {{ $booking->status }}</p> <!-- Display booking status -->
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-primary">View Details</a> <!-- Link to view booking details -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
