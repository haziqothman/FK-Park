<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make your booking here') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md text-center">
            <h1 class="text-2xl font-bold mb-4">Scan this QR Code</h1>
            <div class="mb-4">
                {!! $qrCode !!}
            </div>
            <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 bg-gray-600 text-white rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Cancel
            </a>
        </div>
    </div>
</x-app-layout>
