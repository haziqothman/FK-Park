<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="vehicle_id" class="block text-sm font-medium text-gray-700">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-select mt-1 block w-full">
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->plate_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="parking_space_id" class="block text-sm font-medium text-gray-700">Parking Space</label>
                        <select name="parking_space_id" id="parking_space_id" class="form-select mt-1 block w-full">
                            @foreach ($parkingSpaces as $space)
                                <option value="{{ $space->id }}">{{ $space->location }} - {{ $space->area }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                        <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Checkout</button>
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Cancel</a>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
