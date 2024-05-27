@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Parking Statuses</h1>
    <a href="{{ route('parking-statuses.create') }}" class="btn btn-primary">Add Parking Status</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Date</th>
                <th>Is Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parkingStatuses as $parkingStatus)
            <tr>
                <td>{{ $parkingStatus->id }}</td>
                <td>{{ $parkingStatus->status }}</td>
                <td>{{ $parkingStatus->date }}</td>
                <td>{{ $parkingStatus->is_available ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('parking-statuses.show', $parkingStatus) }}" class="btn btn-info">View</a>
                    <a href="{{ route('parking-statuses.edit', $parkingStatus) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('parking-statuses.destroy', $parkingStatus) }}" method="POST" style="display:inline;">
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
