<?php

namespace App\Http\Controllers;

use App\Models\QRCode;
use App\Models\Booking;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qrCodes = QRCode::all();
        return view('qr_codes.index', compact('qrCodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookings = Booking::all();
        return view('qr_codes.create', compact('bookings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'qr_code' => 'required|string|max:255',
        ]);

        QRCode::create($request->all());

        return redirect()->route('qr-codes.index')
                         ->with('success', 'QR Code created successfully.');
    }
    /**
     * Display the specified resource.
     */
   
     public function show(QRCode $qrCode)
     {
         return view('qr_codes.show', compact('qrCode'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QRCode $qrCode)
    {
        $bookings = Booking::all();
        return view('qr_codes.edit', compact('qrCode', 'bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QRCode $qrCode)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'qr_code' => 'required|string|max:255',
        ]);

        $qrCode->update($request->all());

        return redirect()->route('qr-codes.index')
                         ->with('success', 'QR Code updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QRCode $qrCode)
    {
        $qrCode->delete();

        return redirect()->route('qr-codes.index')
                         ->with('success', 'QR Code deleted successfully.');
    }
}
