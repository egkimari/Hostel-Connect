@extends('frontend.layout')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <!-- Table to display users -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <!-- Display user information -->
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- Edit button with link to edit user -->
                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        
                        <!-- Form for delete action -->
                        <form action="{{ route('admin.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
