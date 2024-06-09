<!-- resources/views/booking/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Reservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('bookings.update', ['booking' => $booking->bookingID]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="vehicleID" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle</label>
                            @if ($booking->bookingStatus !== 'Successful(guest)')
                                <select name="vehicleID" id="vehicleID" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}" {{ $vehicle->id == $booking->vehicleID ? 'selected' : '' }}>{{ $vehicle->plate_number }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="vehicleID" id="vehicleID" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md blur" disabled>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}" {{ $vehicle->id == $booking->vehicleID ? 'selected' : '' }}>{{ $vehicle->plate_number }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="spaceID" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Parking Space</label>
                            <select name="spaceID" id="spaceID" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                                @foreach ($parkingSpaces as $space)
                                    <option value="{{ $space->id }}" {{ $space->id == $booking->spaceID ? 'selected' : '' }}>{{ $space->location }} - {{ $space->area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="startTime" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
                            <input type="datetime-local" name="startTime" id="startTime" value="{{ date('Y-m-d\TH:i', strtotime($booking->startTime)) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="endTime" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time</label>
                            <input type="datetime-local" name="endTime" id="endTime" value="{{ date('Y-m-d\TH:i', strtotime($booking->endTime)) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <input type="hidden" name="bookingStatus" id="bookingStatus" value="{{ $booking->bookingStatus }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Update Reservation</button>
                            <a href="{{ route('bookings.index') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
