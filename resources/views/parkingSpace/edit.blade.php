<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Parking Space</h1>

    <!-- Form to edit an existing parking space -->
    <form action="{{ route('parking-spaces.update', $parkingSpace->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="{{ $parkingSpace->location }}" required><br>

        <label for="area">Area:</label>
        <input type="text" id="area" name="area" value="{{ $parkingSpace->area }}" required><br>

        <button type="submit">Update Parking Space</button>
    </form>
@endsection
