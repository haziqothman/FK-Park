@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bookings</h1>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add Booking</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Vehicle</th>
                <th>Parking Space</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->vehicle->plate_number }}</td>
                <td>{{ $booking->parkingSpace->location }}</td>
                <td>{{ $booking->start_time }}</td>
                <td>{{ $booking->end_time }}</td>
                <td>{{ $booking->booking_status }}</td>
                <td>
                    <a href="{{ route('bookings.show', $booking) }}" class="btn btn-info">View</a>
                    <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
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
