<!-- resources/views/qrcode/confirm.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirm your booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('error'))
                        <div class="mb-4 text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="mb-4">
                        <h3 class="text-lg font-medium">Booking Details</h3>
                        <p><strong>Plate Number:</strong> {{ $bookingDetails['plate_number'] }}</p>
                        <p><strong>Model:</strong> {{ $bookingDetails['model'] }}</p>
                        <p><strong>Color:</strong> {{ $bookingDetails['color'] }}</p>
                        <p><strong>Vehicle Type:</strong> {{ $bookingDetails['vehicle_type'] }}</p>
                        <p><strong>Start Time:</strong> {{ $bookingDetails['start_time'] }}</p>
                        <p><strong>End Time:</strong> {{ $bookingDetails['end_time'] }}</p>
                        <p><strong>Parking Space:</strong> {{ $bookingDetails['parking_space_id'] }}</p>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Confirm</a>
                        <a href="{{ route('qrcode.create') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
