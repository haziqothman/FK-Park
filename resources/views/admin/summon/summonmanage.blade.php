<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Summon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Summon Management") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (Session::get('success'))
                        <span class="alert alert-success">{{Session::get('success')}}</span>

                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button><a href="{{url('admin/add-summon')}}" class=" btn-sm float-end">
                                {{ __('Add Summon') }}
                            </a></x-primary-button>
                    </div>
                    <br>
                    <table class="border-collapse border border-slate-500 table-fixed" style="width:100%">
                    <thead>
                            <th class="border-collapse border border-slate-500 table-fixed">No.</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Summon ID</th>
                            <th class="border-collapse border border-slate-500 table-fixed">User ID</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Category</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Amount (RM)</th>
                            <th class="border-collapse border border-slate-500 table-fixed">Demerit Point</th>
                        </thead>
                        <tbody>
                            <td class="border-collapse border border-slate-500 table-fixed"></td>
                            <td class="border-collapse border border-slate-500 table-fixed"></td>
                            <td class="border-collapse border border-slate-500 table-fixed"></td>
                            <td class="border-collapse border border-slate-500 table-fixed"></td>
                            <td class="border-collapse border border-slate-500 table-fixed"></td>
                            <td class="border-collapse border border-slate-500 table-fixed"></td>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>