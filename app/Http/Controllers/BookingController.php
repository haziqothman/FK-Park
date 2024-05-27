<?php

namespace App\Http\Controllers;


use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Assuming you have a User model
    
        // Other code to fetch vehicles and parkingSpaces if needed
    
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'parking_space_id' => 'required|exists:parking_spaces,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'booking_status' => 'required|string|max:255',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $users = User::all();
        $vehicles = Vehicle::all();
        $parkingSpaces = ParkingSpace::all();
        return view('bookings.edit', compact('booking', 'users', 'vehicles', 'parkingSpaces'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'parking_space_id' => 'required|exists:parking_spaces,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'booking_status' => 'required|string|max:255',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking deleted successfully.');
    }
    public function showBookingPage()
{
    // Retrieve users from the database or any other source
    $users = User::all(); // Assuming you have a User model

    // Pass the $users variable to the view
    return view('booking', ['users' => $users]);
}
}
