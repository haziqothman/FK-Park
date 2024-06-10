<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Add User") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::get('fail'))
                    <span class="alert alert-danger">{{Session::get('fail')}}</span>
                
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('add-user')}}" method="post">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-100/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">User's
                                    Information</h2>
                                <br>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Username</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" autocomplete="user-name" required value="{{ old('name')}}"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sm:col-span-4">
                                        <label for="email"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Email
                                            address</label>
                                        <div class="mt-2">
                                            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email')}}"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sm:col-span-4">
                                        <label for="password"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Password
                                            address</label>
                                        <div class="mt-2">
                                            <input id="password" name="password" type="password" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sm:col-span-3">
                                        <label for="userType"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Role</label>
                                        <div class="mt-2">
                                            <select id="userType" name="userType"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="student">student</option>
                                                <option value="staff">staff</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            
                            <x-secondary-button style="margin-right: 10px;"><a href="{{url('/usermanage')}}" class=" btn-sm float-end">
                                {{ __('Cancel') }}
                            </a></x-secondary-button>
                            <x-primary-button type="submit">
                                {{ __('Save') }}
                            </a></x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>