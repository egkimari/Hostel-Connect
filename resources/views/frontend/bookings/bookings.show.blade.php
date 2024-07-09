@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    <p>Booking ID: {{ $booking->id }}</p>
    <p>Hostel: {{ $booking->hostel->name }}</p>
    <p>Status: {{ $booking->status }}</p>
    <p>Start Date: {{ $booking->start_date }}</p>
    <p>End Date: {{ $booking->end_date }}</p>
    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
