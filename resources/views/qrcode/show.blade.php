<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span class="mr-2"></span>
            {{ __('Your Booking Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Booking Details</h3>
                    <ul>
                        <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
                        <li><strong>Vehicle:</strong> {{ $booking->vehicle->plate_number }}</li>
                        <li><strong>Parking Space:</strong> {{ $booking->parkingSpace->location }} ({{ $booking->parkingSpace->area }})</li>
                        <li><strong>Start Time:</strong> {{ $booking->start_time }}</li>
                        <li><strong>End Time:</strong> {{ $booking->end_time }}</li>
                        <li><strong>Booking Status:</strong> <span style="color: #0AF501;">{{ $booking->booking_status }}</span></li>
                    </ul>
                    <div id="qr-code" style="display: none;" class="mt-6 flex justify-center">
                        {!! $qrCode !!}
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('bookings.index') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-4">Back to Reservations</a>
                        <button onclick="toggleQRCode()" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">QR Code</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleQRCode() {
            var qrCodeDiv = document.getElementById('qr-code');
            if (qrCodeDiv.style.display === 'none' || qrCodeDiv.style.display === '') {
                qrCodeDiv.style.display = 'block';
            } else {
                qrCodeDiv.style.display = 'none';
            }
        }
    </script>
</x-app-layout>
