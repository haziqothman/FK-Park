@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $booking->id }}</td>
        </tr>
        <tr>
            <th>User</th>
            <td>{{ $booking->user->name }}</td>
        </tr>
        <tr>
            <th>Vehicle</th>
            <td>{{ $booking->vehicle->plate_number }}</td>
        </tr>
        <tr>
            <th>Parking Space</th>
            <td>{{ $booking->parkingSpace->location }}</td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td>{{ $booking->start_time }}</td>
        </tr>
        <tr>
            <th>End Time</th>
            <td>{{ $booking->end_time }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $booking->booking_status }}</td>
        </tr>
    </table>
    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
