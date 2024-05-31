<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('bookings.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Create Booking</a>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Vehicle
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Parking Space
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Start Time
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    End Time
                                </th>
                                <th scope="col" class="relative px-6 py-3 bg-gray-50 dark:bg-gray-900">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->vehicle->plate_number }}</td>
                                <td>{{ $booking->parkingSpace->location }} ({{ $booking->parkingSpace->area }})</td>
                                <td>{{ $booking->startTime }}</td>
                                <td>{{ $booking->endTime }}</td>
                                <td>
                                    <a href="{{ route('bookings.show', $booking->bookingID) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('bookings.edit', $booking->bookingID) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('bookings.destroy', $booking->bookingID) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($bookings->isEmpty())
                        <p class="mt-4 text-center text-gray-500 dark:text-gray-400">No reservations found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
