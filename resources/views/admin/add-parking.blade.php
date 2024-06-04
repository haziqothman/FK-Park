<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Parking Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Add Parking") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::get('fail'))
                    <span class="alert alert-danger">{{Session::get('fail')}}</span>
                
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('AddUser')}}" method="post">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-100/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">Parking Space Information</h2>
                                <br>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                        <label for="userType"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Parking Location</label>
                                        <div class="mt-2">
                                            <select id="location" name="location" autocomplete="Location"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="A">Area A</option>
                                                <option value="B">Area B</option>
                                                <option value="C">Area C</option>
                                                <option value="D">Area D</option>
                                                <option value="E">Area E</option>
                                                <option value="F">Area F</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="created_at"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Created At</label>
                                        <div class="mt-2">
                                            <input id="created_at" name="create_at" type="time" autocomplete="created_at" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-input-error :messages="$errors->get('created_at')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button"
                                class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-100">Cancel</button>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>