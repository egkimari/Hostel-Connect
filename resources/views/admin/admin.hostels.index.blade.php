<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Hostel Management</title>
    <link rel="stylesheet" href="{{ asset('css/mhreg.css') }}">
    <style>
        body {
            width: 100vw;
            background-color: #D2DBDD;
            margin: 0;
            font-family: helvetica;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #292929;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 16px;
        }
    </style>
</head>
<body>
@include('layouts.header')

<div class="container">
    <h1>Manage Hostels</h1>
    <a href="{{ route('admin.hostel.create') }}" class="btn">Add New Hostel</a>
    <table>
        <thead>
            <tr>
                <th>Hostel Name</th>
                <th>Location</th>
                <th>Rooms</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through hostels -->
            @foreach ($hostels as $hostel)
            <tr>
                <td>{{ $hostel->name }}</td>
                <td>{{ $hostel->location }}</td>
                <td>{{ $hostel->rooms }}</td>
                <td>
                    <a href="{{ route('admin.hostel.edit', $hostel->id) }}">Edit</a>
                    <a href="{{ route('admin.hostel.destroy', $hostel->id) }}" 
                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $hostel->id }}').submit();">Delete</a>
                    <form id="delete-form-{{ $hostel->id }}" action="{{ route('admin.hostel.destroy', $hostel->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
