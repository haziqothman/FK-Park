@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add QR Code</h1>
    <form action="{{ route('qr-codes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="booking_id" class="form-label">Booking</label>
            <select class="form-control" id="booking_id" name="booking_id" required>
                @foreach($bookings as $booking)
                <option value="{{ $booking->id }}">{{ $booking->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="qr_code" class="form-label">QR Code</label>
            <input type="text" class="form-control" id="qr_code" name="qr_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
