@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Parking Status Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $parkingStatus->id }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $parkingStatus->status }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $parkingStatus->date }}</td>
        </tr>
        <tr>
            <th>Is Available</th>
            <td>{{ $parkingStatus->is_available ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
    <a href="{{ route('parking-statuses.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
