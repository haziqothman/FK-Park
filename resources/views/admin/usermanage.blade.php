<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User Management") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (Session::get('success'))
                        <span class="alert alert-success">{{Session::get('success')}}</span>

                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button><a href="{{url('admin/add-user')}}" class=" btn-sm float-end">
                                {{ __('Add User') }}
                            </a></x-primary-button>
                    </div>
                    <br>
                    <table class="border-collapse border border-slate-500 table-fixed" style="width:100%">
                        <thead>
                            <tr>
                                <th class="border-collapse border border-slate-500 table-fixed">ID</th>
                                <th class="border-collapse border border-slate-500 table-fixed">Username</th>
                                <th class="border-collapse border border-slate-500 table-fixed">Email</th>
                                <th class="border-collapse border border-slate-500 table-fixed">Role</th>
                                <th class="border-collapse border border-slate-500 table-fixed">Summon Amount</th>
                                <th class="border-collapse border border-slate-500 table-fixed">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($getRecord as $value)
                            <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->userType }}</td>
                                <td>{{ $value->summonAmount }}</td>
                                <td>Action</td>
                            </tr>
                        @endforeach                  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>