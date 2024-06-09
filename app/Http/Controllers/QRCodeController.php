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
        // Validate the form data
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
            // Attempt to create a new vehicle
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
    
            // Set the success message
            $message = 'Booking created successfully!';
        } catch (QueryException $e) {
            // Log the exception message for debugging
            \Log::error('Database error: ' . $e->getMessage());
    
            // Check if the exception is a duplicate entry error
            if ($e->errorInfo[1] == 1062) {
                // If it's a duplicate entry error, set the error message
                $message = 'The plate number already exists. Please enter a different plate number.';
            } else {
                // If it's a different database error, set a generic error message
                $message = 'An unexpected error occurred. Please try again later.';
            }
        }
    
        // Redirect the user with the appropriate message
        return redirect()->route('qrcode.confirm')->with(isset($e) ? 'error' : 'success', $message);
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
