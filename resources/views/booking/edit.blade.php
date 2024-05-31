<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="vehicle_id" class="block text-sm font-medium text-gray-700">Vehicle</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-select mt-1 block w-full">
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ $vehicle->id == $booking->vehicle_id ? 'selected' : '' }}>{{ $vehicle->plate_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="parking_space_id" class="block text-sm font-medium text-gray-700">Parking Space</label>
                            <select name="parking_space_id" id="parking_space_id" class="form-select mt-1 block w-full">
                                @foreach ($parkingSpaces as $parkingSpace)
                                    <option value="{{ $parkingSpace->id }}" {{ $parkingSpace->id == $booking->parking_space_id ? 'selected' : '' }}>{{ $parkingSpace->number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full" value="{{ $booking->start_time->format('Y-m-d\TH:i') }}">
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full" value="{{ $booking->end_time->format('Y-m-d\TH:i') }}">
                        </div>
                        <div class="mb-4">
                            <label for="booking_status" class="block text-sm font-medium text-gray-700">Booking Status</label>
                            <input type="text" name="booking_status" id="booking_status" class="form-input mt-1 block w-full" value="{{ $booking->booking_status }}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
