<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Parking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Parking Management") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (Session::get('success'))
                        <span class="alert alert-success">{{Session::get('success')}}</span>

                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button><a href="/add/parking" class=" btn-sm float-end">
                                {{ __('Add Parking') }}
                            </a></x-primary-button>
                    </div>
                    <table class="border-collapse border border-slate-500 table-fixed">
                        <thead class="border-collapse border border-slate-500 table-fixed">
                            <th>No</th>
                            <th>Parking Location</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Parking A</td>
                            <td>11.55 am</td>
                            <td>12.05 am</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
