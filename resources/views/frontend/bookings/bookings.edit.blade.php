@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>
    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')
        <!-- Select Hostel -->
        <div class="form-group">
            <label for="hostel_id">Hostel</label>
            <select class="form-control" id="hostel_id" name="hostel_id" required>
                @foreach($hostels as $hostel)
                    <option value="{{ $hostel->id }}" {{ $booking->hostel_id == $hostel->id ? 'selected' : '' }}>{{ $hostel->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Input for Start Date -->
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $booking->start_date }}" required>
        </div>
        <!-- Input for End Date -->
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $booking->end_date }}" required>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
