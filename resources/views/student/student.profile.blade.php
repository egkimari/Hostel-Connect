@extends('frontend.layout')

@section('title', 'Student Profile')

@section('content')
    <div class="container mt-4">
        <h2>Student Profile</h2>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Profile Form -->
        <form method="POST" action="{{ route('student.profile.update') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank if you do not want to change your password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password:</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your new password">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
