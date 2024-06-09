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
                    <br>
                    <table class="border-collapse border border-slate-500 table-fixed" style="width:100%">
                        <thead class="border-collapse border border-slate-500 table-fixed">
                            <th class="border-collapse border border-slate-500 table-fixed">No</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Parking Location</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Created At</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Updated At</th>
                        </thead>
                        <tbody>
                            <td class="border-collapse border border-slate-500 table-fixed">1</td>
                            <td class="border-collapse border border-slate-500 table-fixed">Parking A</td>
                            <td class="border-collapse border border-slate-500 table-fixed">11.55 am</td>
                            <td class="border-collapse border border-slate-500 table-fixed">12.05 am</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
