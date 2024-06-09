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
                    
                    <form action="{{ route('bookings.store') }}" method="POST" id="booking-form">
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
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="parking_space_id" class="block text-sm font-medium text-gray-700">Parking Space</label>
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

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startTimeInput = document.getElementById('start_time');
            const endTimeInput = document.getElementById('end_time');
            const parkingSpaceSelect = document.getElementById('parking_space_id');
            const errorContainer = document.createElement('div');
            errorContainer.classList.add('text-red-600', 'mb-4');

            function fetchAvailableParkingSpaces() {
                const startTime = startTimeInput.value.replace('T', ' ');
                const endTime = endTimeInput.value.replace('T', ' ');

                // console.log('Start Time:', startTime);
                // console.log('End Time:', endTime);

                if (startTime && endTime) {
                    fetch(`/bookings/available-spaces?start_time=${startTime}&end_time=${endTime}`)
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error('Error fetching available spaces: ' + response.statusText);
                            }
                        })
                        .then(data => {
                            console.log('Available Spaces:', data);
                            parkingSpaceSelect.innerHTML = '';
                            errorContainer.textContent = ''; // Clear previous error message

                            if (data.length === 0) {
                                const noOption = document.createElement('option');
                                noOption.textContent = 'No available parking spaces for the selected time.';
                                parkingSpaceSelect.appendChild(noOption);
                            } else {
                                data.forEach(space => {
                                    const option = document.createElement('option');
                                    option.value = space.id;
                                    option.textContent = `${space.location} - ${space.area}`;
                                    parkingSpaceSelect.appendChild(option);
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching available spaces:', error);
                            errorContainer.textContent = 'Error fetching available parking spaces. Please try again later.';
                            parkingSpaceSelect.innerHTML = '';
                            const defaultOption = document.createElement('option');
                            defaultOption.value = '';
                            defaultOption.textContent = 'Select a parking space';
                            parkingSpaceSelect.appendChild(defaultOption);
                        });
                } else {
                    parkingSpaceSelect.innerHTML = '';
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.textContent = 'Select a parking space';
                    parkingSpaceSelect.appendChild(defaultOption);
                }
            }

            startTimeInput.addEventListener('change', fetchAvailableParkingSpaces);
            endTimeInput.addEventListener('change', fetchAvailableParkingSpaces);

            const bookingForm = document.getElementById('booking-form');
            bookingForm.insertAdjacentElement('beforebegin', errorContainer);
        });
    </script> -->

</x-app-layout>
