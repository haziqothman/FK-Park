@extends('layouts.app')

@section('content')
<div class="container">
    <h1>QR Code Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $qrCode->id }}</td>
        </tr>
        <tr>
            <th>Booking</th>
            <td>{{ $qrCode->booking_id }}</td>
        </tr>
        <tr>
            <th>QR Code</th>
            <td>{{ $qrCode->qr_code }}</td>
        </tr>
    </table>
    <a href="{{ route('qr-codes.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
