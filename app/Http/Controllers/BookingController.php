<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
    
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time'));
    
        // Check for overlapping bookings
        $existingBookings = Booking::where('spaceID', $request->input('parking_space_id'))
                                    ->where(function($query) use ($startTime, $endTime) {
                                        $query->where(function($query) use ($startTime, $endTime) {
                                            $query->whereBetween('startTime', [$startTime, $endTime])
                                                  ->orWhereBetween('endTime', [$startTime, $endTime]);
                                        })->orWhere(function($query) use ($startTime, $endTime) {
                                            $query->where('startTime', '<=', $startTime)
                                                  ->where('endTime', '>=', $endTime);
                                        });
                                    })
                                    ->exists();
    
        if ($existingBookings) {
            // Notify the user about the clash
            return redirect()->route('bookings.create')->with('error', 'Booking clash detected for the selected parking space. Please choose a different time slot.');
        }
    
        // Store booking details in session
        session([
            'booking_details' => [
                'userID' => auth()->id(),
                'vehicleID' => $request->input('vehicle_id'),
                'spaceID' => $request->input('parking_space_id'),
                'startTime' => $startTime,
                'endTime' => $endTime,
                'bookingStatus' => 'successful', // Default status, change if needed
            ]
        ]);
    
        // Redirect to the confirmation page
        return redirect()->route('bookings.confirm');
    }
    

    public function show($booking)
{
    $booking = Booking::with('vehicle', 'parkingSpace')->findOrFail($booking);

    $qrCode = QrCode::size(200)->generate(route('bookings.show', $booking));

    return view('booking.show', compact('booking', 'qrCode'));
}

public function edit($id)
{
    $booking = Booking::findOrFail($id);
    $vehicles = Vehicle::all();
    $parkingSpaces = ParkingSpace::all();
   
    return view('booking.edit', compact('booking', 'vehicles', 'parkingSpaces'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'vehicleID' => 'required|exists:vehicles,id',
        'spaceID' => 'required|exists:parking_spaces,id',
        'startTime' => 'required|date',
        'endTime' => 'required|date|after:startTime',
        'bookingStatus' => 'required|string|max:255',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->update([
        'userID' => auth()->id(),
        'vehicleID' => $request->input('vehicleID'),
        'spaceID' => $request->input('spaceID'),
        'startTime' => $request->input('startTime'),
        'endTime' => $request->input('endTime'),
        'bookingStatus' => $request->input('bookingStatus'),
        
    ]);

    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
}

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }

    public function confirm()
    {
        $bookingDetails = session('booking_details');
        
        if (!$bookingDetails) {
            return redirect()->route('bookings.create')->with('error', 'No booking details found.');
        }

        return view('booking.confirm', compact('bookingDetails'));
    }

    public function finalize(Request $request)
    {
        $bookingDetails = session('booking_details');

        if (!$bookingDetails) {
            return redirect()->route('bookings.create')->with('error', 'No booking details found.');
        }

        $booking = Booking::create($bookingDetails);
        $qrCode = QrCode::size(200)->generate(route('bookings.show', $booking->bookingID));
        session()->forget('booking_details');

        return view('booking.complete', compact('qrCode', 'booking'));
    }

//     public function availableParkingSpaces(Request $request)
// {
//     $request->validate([
//         'start_time' => 'required|date',
//         'end_time' => 'required|date|after:start_time',
//     ]);

//     $startTime = Carbon::parse($request->input('start_time'));
//     $endTime = Carbon::parse($request->input('end_time'));

//     $availableSpaces = ParkingSpace::whereDoesntHave('bookings', function($query) use ($startTime, $endTime) {
//         $query->where(function($query) use ($startTime, $endTime) {
//             $query->where('endTime', '>', $startTime)
//                   ->where('startTime', '<', $endTime);
//         });
//     })->get();

//     return response()->json($availableSpaces);
//     }
}