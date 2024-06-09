<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Booking Complete') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Your Booking is Complete!</h3>
                    <p>Scan the QR code to view your booking details:</p>
                    <div class="mt-6 flex justify-center">
                        {!! $qrCode !!}
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('qrcode.create') }}" class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mr-4">Back to Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
