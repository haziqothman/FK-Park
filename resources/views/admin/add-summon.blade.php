<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Issue New Summon Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("New Summon") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::get('fail'))
                    <span class="alert alert-danger">{{Session::get('fail')}}</span>

                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('add-summon')}}" method="post">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-100/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">
                                    Fill in Summon Information
                                </h2>
                                <br>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Who
                                            is this summon for</label>
                                        <div class="mt-2">
                                            <input type="number" name="id" required value="{{ old('id')}}"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sm:col-span-3">
                                        <label for="summonCategory"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Category</label>
                                        <div class="mt-2">
                                            <select name="summonCategory"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="parking violation">Parking Violation</option>
                                                <option value="uncomply with campus regulation">Not Comply to Campus
                                                    Traffic Regulations</option>
                                                <option value="accident">Accident</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sm:col-span-4">
                                        <label for="summonAmount"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Summon
                                            Amount
                                            (Parking:10, Campus Traffic:15, Accident:20)</label>
                                        <div class="mt-2">
                                            <input name="summonAmount" type="number" required value="{{ old('summonAmount')}}"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <x-input-error :messages="$errors->get('summonAmount')" class="mt-2" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sm:col-span-3">
                                        <label for="demeritPoint"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Demerit Point</label>
                                        <div class="mt-2">
                                            <select name="demeritPoint"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="10">Parking Violation</option>
                                                <option value="15">Not Comply to Campus
                                                    Traffic Regulations</option>
                                                <option value="20">Accident</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">

                            <x-secondary-button style="margin-right: 10px;"><a href="{{url('/summonmanage')}}"
                                    class=" btn-sm float-end">
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