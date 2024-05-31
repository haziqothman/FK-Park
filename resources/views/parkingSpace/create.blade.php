<!-- resources/views/parking-spaces/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create New Parking Space</h1>

    <form action="{{ route('parking-spaces.store') }}" method="POST">
        @csrf
        <div>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required><br>
        </div>

        <div>
            <label for="area">Area:</label>
            <input type="text" id="area" name="area" required><br>
        </div>

        <div>
            <button type="submit">Create Parking Space</button>
        </div>
    </form>
@endsection
