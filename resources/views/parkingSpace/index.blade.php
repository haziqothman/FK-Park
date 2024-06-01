<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Parking Spaces') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="flex justify-end">
            <a href="{{ route('parking-statuses.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 mt-4 rounded" style="color:blue;">Add Parking</a>
        </div>
        <table class="table-auto mt-6 w-full">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-800">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">area</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Is Available</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parkingStatuses as $parkingStatus)
                <tr>
                    <td class="border px-4 py-2">{{ $parkingStatus->id }}</td>
                    <td class="border px-4 py-2">{{ $parkingStatus->location }}</td>
                    <td class="border px-4 py-2">{{ $parkingStatus->area }}</td>
                    <td class="border px-4 py-2">{{ $parkingStatus->status }}</td>
                    <td class="border px-4 py-2">{{ $parkingStatus->date }}</td>
                    <td class="border px-4 py-2">{{ $parkingStatus->available }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('parking-statuses.edit', $parkingStatus) }}" class="text-yellow-500 hover:text-yellow-700 mr-2" style="color:blue;">Edit</a>
                        <form action="{{ route('parking-statuses.destroy', $parkingStatus) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" style="color:red;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
