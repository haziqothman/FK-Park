@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>
    <form action="{{ route('bookings.update', $booking) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle</label>
            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ $booking->vehicle_id == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->plate_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="parking_space_id" class="form-label">Parking Space</label>
            <select class="form-control" id="parking_space_id" name="parking_space_id" required>
                @foreach($parkingSpaces as $space)
                <option value="{{ $space->id }}" {{ $booking->parking_space_id == $space->id ? 'selected' : '' }}>{{ $space->location }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $booking->start_time }}" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ $booking->end_time }}" required>
        </div>
        <div class="mb-3">
            <label for="booking_status" class="form-label">Status</label>
            <input type="text" class="form-control" id="booking_status" name="booking_status" value="{{ $booking->booking_status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
