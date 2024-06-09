

<!-- resources/views/bookings/create.blade.php -->



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('scan qr ') }}
        </h2>
    </x-slot>
  
    <h1>Scan QR Code to Book Parking</h1>

    <!-- Display the QR code -->
    <img src="{{ $bookingQrCode }}" alt="Booking QR Code">

</x-app-layout>

