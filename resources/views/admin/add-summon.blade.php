<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Summon Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Add Summon") }}
                </div>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (Session::get('fail'))
                    <span class="alert alert-danger">{{Session::get('fail')}}</span>

                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('AddSummon')}}" method="post">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-100/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-100">Summon's
                                    Information</h2>
                                <br>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="id"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">User
                                            ID</label>
                                        <div class="mt-2">
                                            <input type="number" name="id" id="id" autocomplete="user-id" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="summonCategory"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Role</label>
                                        <div class="mt-2">
                                            <select id="summonCategory" name="summonCategory" autocomplete="summonCategory"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="traffic">Traffic Violation</option>
                                                <option value="parking">Parking Violation</option>
                                                <option value="sticker">Sticker Violation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="summonAmount"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Summon Amount (RM)</label>
                                        <div class="mt-2">
                                            <input type="number" name="summonAmount" id="id" autocomplete="summonAmount" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            <x-input-error :messages="$errors->get('summonAmount')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="demeritPoint"
                                            class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Demerit Point</label>
                                        <div class="mt-2">
                                            <input type="number" name="demeritPoint" id="id" autocomplete="demeritPoint" required
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                            <x-input-error :messages="$errors->get('demeritPoint')" class="mt-2" />
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