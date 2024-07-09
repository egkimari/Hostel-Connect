@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <!-- Profile Edit Form -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf <!-- CSRF protection -->
        @method('PUT') <!-- Method spoofing for PUT request -->

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
