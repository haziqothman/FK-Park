<!-- resources/views/qrcode/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make your booking here') }}
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
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('image/parking.png') }}" alt="Booking Image" class="w-1/2 h-auto">
                    </div>
                    <form action="{{ route('qrcode.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="plate_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plate Number</label>
                            <input type="text" name="plate_number" id="plate_number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                            <input type="text" name="model" id="model" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
                            <input type="text" name="color" id="color" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle Type</label>
                            <select name="vehicle_type" id="vehicle_type" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                                <option value="" disabled selected>Select Vehicle Type</option>
                                <option value="car">Car</option>
                                <option value="motorcycle">Motorcycle</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Time</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="parking_space_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Parking Space</label>
                            <select name="parking_space_id" id="parking_space_id" class="form-select mt-1 block w-full">
                                @foreach ($parkingSpaces as $space)
                                    <option value="{{ $space->id }}">{{ $space->location }} - {{ $space->area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Proceed</button>
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
