@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Parking Status</h1>
    <form action="{{ route('parking-statuses.update', $parkingStatus) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $parkingStatus->status }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $parkingStatus->date }}" required>
        </div>
        <div class="mb-3">
            <label for="is_available" class="form-label">Is Available</label>
            <select class="form-control" id="is_available" name="is_available" required>
                <option value="1" {{ $parkingStatus->is_available ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$parkingStatus->is_available ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
