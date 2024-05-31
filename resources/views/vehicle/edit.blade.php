<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="plate_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plate Number</label>
                            <input type="text" name="plate_number" id="plate_number" value="{{ $vehicle->plate_number }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                            <input type="text" name="model" id="model" value="{{ $vehicle->model }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
                            <input type="text" name="color" id="color" value="{{ $vehicle->color }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div>
                        <!-- <div class="mb-4">
                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle Type</label>
                            <input type="text" name="vehicle_type" id="vehicle_type" value="{{ $vehicle->vehicle_type }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                        </div> -->
                        <div class="mb-4">
                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle Type</label>
                            <select type="text" name="vehicle_type" id="vehicle_type" value="{{ $vehicle->vehicle_type }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 rounded-md" required>
                                <option value="" disabled selected>Select Vehicle Type</option>
                                <option value="car">Car</option>
                                <option value="motorcycle">Motorcycle</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
