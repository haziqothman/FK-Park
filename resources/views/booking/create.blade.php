@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Booking</h1>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle</label>
            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->plate_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="parking_space_id" class="form-label">Parking Space</label>
            <select class="form-control" id="parking_space_id" name="parking_space_id" required>
                @foreach($parkingSpaces as $space)
                <option value="{{ $space->id }}">{{ $space->location }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>
        <div class="mb-3">
            <label for="booking_status" class="form-label">Status</label>
            <input type="text" class="form-control" id="booking_status" name="booking_status" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
