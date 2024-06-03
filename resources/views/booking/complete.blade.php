<!-- resources/views/booking/complete.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking Complete') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h3 class="text-lg font-semibold mb-4">Your booking was successful. Here is your QR code for reference:</h3>
                    <div class="flex justify-center mb-6">
                        {!! $qrCode !!}
                    </div>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('bookings.show', $booking->bookingID) }}" class="inline-block px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition" style="color:blue;">Show My Reservation</a>
                        <a href="{{ route('bookings.index') }}" class="inline-block px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition" style="color:red;">Back to My Reservations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
