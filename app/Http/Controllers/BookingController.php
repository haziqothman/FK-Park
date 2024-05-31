<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    public function index()
    {
        // Fetch the bookings for the authenticated user
        $bookings = Booking::with('vehicle', 'parkingSpace')
                            ->where('userID', auth()->id())
                            ->get();

        // Return the view with the bookings
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        $parkingSpaces = ParkingSpace::all();

        return view('booking.create', compact('vehicles', 'parkingSpaces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'parking_space_id' => 'required|exists:parking_spaces,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);
        
        // Create a new booking
        Booking::create([
            'userID' => auth()->id(),
            'vehicleID' => $request->input('vehicle_id'),
            'spaceID' => $request->input('parking_space_id'),
            'startTime' => $request->input('start_time'),
            'endTime' => $request->input('end_time'),
            'bookingStatus' => 'pending', // Default status, change if needed
        ]);
    
        // Redirect to the index page with a success message
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }
    

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        $parkingSpaces = ParkingSpace::all();

        return view('booking.edit', compact('booking', 'vehicles', 'parkingSpaces'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'parking_space_id' => 'required|exists:parking_spaces,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'booking_status' => 'required|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'vehicle_id' => $request->vehicle_id,
            'parking_space_id' => $request->parking_space_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'booking_status' => $request->booking_status,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
