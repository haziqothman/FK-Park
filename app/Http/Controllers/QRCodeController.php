<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use App\Models\ParkingSpace;

class QRCodeController extends Controller
{

public function index()

    { 
        // Fetch all parking spaces
        $parkingSpaces = ParkingSpace::all();

        // Return the view with the parking spaces
        return view('qrcode.create', compact('parkingSpaces'));
    
    }

    public function create()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        $parkingSpaces = ParkingSpace::all();

        return view('qrcode.create', compact('vehicles', 'parkingSpaces'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plate_number' => 'required|string|unique:vehicles,plate_number',
            'model' => 'required|string',
            'color' => 'required|string',
            'vehicle_type' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'parking_space_id' => 'required|exists:parking_spaces,id',
        ]);

        try {
            $vehicle = Vehicle::create([
                'user_id' => auth()->check() ? auth()->id() : null,
                'plate_number' => $validatedData['plate_number'],
                'model' => $validatedData['model'],
                'color' => $validatedData['color'],
                'vehicle_type' => $validatedData['vehicle_type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $booking = new Booking();
            $booking->userID = auth()->check() ? auth()->id() : null;
            $booking->vehicleID = $vehicle->id;
            $booking->spaceID = $validatedData['parking_space_id'];
            $booking->startTime = $validatedData['start_time'];
            $booking->endTime = $validatedData['end_time'];
            $booking->bookingStatus = 'successful(guest)';
            $booking->save();

            session([
                'booking_details' => [
                    'userID' => auth()->id(),
                    'vehicleID' => $vehicle->id,
                    'spaceID' => $booking->spaceID,
                    'startTime' => $booking->startTime,
                    'endTime' => $booking->endTime,
                    'bookingStatus' => $booking->bookingStatus,
                ]
            ]);

            $message = 'Booking created successfully!';
        } catch (\Illuminate\Database\QueryException $e) {
            \Log::error('Database error: ' . $e->getMessage());

            if ($e->errorInfo[1] == 1062) {
                $message = 'The plate number already exists. Please enter a different plate number.';
            } else {
                $message = 'An unexpected error occurred. Please try again later.';
            }

            return redirect()->route('qrcode.create')->with('error', $message);
        }

        return redirect()->route('qrcode.confirm')->with('success', $message);
    }

    

    public function confirm()
    {
        $bookingDetails = session('booking_details');
        
        if (!$bookingDetails) {
            return redirect()->route('qrcode.create')->with('error', 'No booking details found.');
        }

        return view('qrcode.confirm', compact('bookingDetails'));
    }

    public function show($booking)
    {
        $booking = Booking::with('vehicle', 'parkingSpace')->findOrFail($booking);
    
        $qrCode = QrCode::size(200)->generate(route('qrcode.show', $booking));
    
        return view('qrcode.show', compact('booking', 'qrCode'));
    }
}