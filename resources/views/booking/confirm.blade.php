<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Confirm Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Please confirm your booking details</h3>
                    <ul>
                        <li><strong>Vehicle:</strong> {{ $bookingDetails['vehicleID'] }}</li>
                        <li><strong>Parking Space:</strong> {{ $bookingDetails['spaceID'] }}</li>
                        <li><strong>Start Time:</strong> {{ $bookingDetails['startTime'] }}</li>
                        <li><strong>End Time:</strong> {{ $bookingDetails['endTime'] }}</li>
                    </ul>
                    <div class="mt-6 flex justify-end">
                        <form action="{{ route('bookings.finalize') }}" method="POST" class="inline-block mr-2">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Confirm</button>
                        </form>
                        <a href="{{ route('bookings.create') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
