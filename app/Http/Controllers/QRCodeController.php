<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use App\Models\ParkingSpace;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{

public function index()

    { 
        // Fetch all parking spaces
        $parkingSpaces = ParkingSpace::all();

        // Return the view with the parking spaces
        return view('qrcode.create', compact('parkingSpaces'));
    
    }

    public function scan()
    {
        // Generate the URL to the qrcode.create route
        $url = route('qrcode.create');
        
        // Generate the QR code
        $qrCode = QrCode::size(300)->generate($url);

        return view('qrcode.scan', compact('qrCode'));
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
            'plate_number' => 'required|string',
            'model' => 'required|string',
            'color' => 'required|string',
            'vehicle_type' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'parking_space_id' => 'required|exists:parking_spaces,id',
        ]);
    
        DB::beginTransaction();
    
        try {
            // Check if a vehicle with the same plate number already exists
            $vehicle = Vehicle::where('plate_number', $validatedData['plate_number'])->first();
    
            if (!$vehicle) {
                // If the vehicle does not exist, create a new one
                $vehicle = Vehicle::create([
                    'user_id' => auth()->check() ? auth()->id() : null,
                    'plate_number' => $validatedData['plate_number'],
                    'model' => $validatedData['model'],
                    'color' => $validatedData['color'],
                    'vehicle_type' => $validatedData['vehicle_type'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            // Check if a reservation already exists for this vehicle in the same time slot and parking space
            $existingBooking = Booking::where('vehicleID', $vehicle->id)
                ->where('spaceID', $validatedData['parking_space_id'])
                ->where('startTime', $validatedData['start_time'])
                ->where('endTime', $validatedData['end_time'])
                ->first();
    
            if ($existingBooking) {
                DB::rollBack();
                return redirect()->route('qrcode.create')->with('error', 'This reservation already exists.');
            }
    
            // Create a new booking
            $booking = Booking::create([
                'userID' => auth()->check() ? auth()->id() : null,
                'vehicleID' => $vehicle->id,
                'spaceID' => $validatedData['parking_space_id'],
                'startTime' => $validatedData['start_time'],
                'endTime' => $validatedData['end_time'],
                'bookingStatus' => 'successful(guest)',
            ]);
    
            // Store booking details in the session
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
    
            DB::commit();
    
            return redirect()->route('qrcode.confirm')->with('success', 'Booking created successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            \Log::error('Database error: ' . $e->getMessage());
    
            if ($e->errorInfo[1] == 1062) {
                $message = 'The plate number already exists. Please enter a different plate number.';
            } else {
                $message = 'An unexpected error occurred. Please try again later.';
            }
    
            return redirect()->route('qrcode.create')->with('error', $message);
        }
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