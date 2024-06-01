<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Booking ID: {{ $booking->id }}</h3>
                    <p>Vehicle: {{ $booking->vehicle->plate_number ?? 'N/A' }}</p>
                    <p>Parking Space: {{ $booking->parkingSpace->number ?? 'N/A' }}</p>
                    <p>Start Time: {{ $booking->start_time }}</p>
                    <p>End Time: {{ $booking->end_time }}</p>
                    <p>Status: {{ $booking->booking_status }}</p>
                    @if($booking->qr_code)
                        <img src="{{ asset($booking->qr_code) }}" alt="QR Code">
                    @endif
                    <div class="mt-4">
                        <a href="{{ route('bookings.edit', ['booking' => $booking->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('bookings.destroy', ['booking' => $booking->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
