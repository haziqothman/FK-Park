@extends('layouts.app')

@section('content')
<div class="container">
    <h1>QR Codes</h1>
    <a href="{{ route('qr-codes.create') }}" class="btn btn-primary">Add QR Code</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Booking</th>
                <th>QR Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($qrCodes as $qrCode)
            <tr>
                <td>{{ $qrCode->id }}</td>
                <td>{{ $qrCode->booking_id }}</td>
                <td>{{ $qrCode->qr_code }}</td>
                <td>
                    <a href="{{ route('qr-codes.show', $qrCode) }}" class="btn btn-info">View</a>
                    <a href="{{ route('qr-codes.edit', $qrCode) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('qr-codes.destroy', $qrCode) }}" method="POST" style="display:inline;">
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
