<?php

namespace App\Http\Controllers;

use App\Models\ParkingStatus;
use Illuminate\Http\Request;

class ParkingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkingStatuses = ParkingStatus::all();
        return view('parking_statuses.index', compact('parkingStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parking_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'date' => 'required|date',
            'is_available' => 'required|boolean',
        ]);

        ParkingStatus::create($request->all());

        return redirect()->route('parking-statuses.index')
                         ->with('success', 'Parking Status created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ParkingStatus $parkingStatus)
    {
        return view('parking_statuses.show', compact('parkingStatus'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingStatus $parkingStatus)
    {
        return view('parking_statuses.edit', compact('parkingStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParkingStatus $parkingStatus)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'date' => 'required|date',
            'is_available' => 'required|boolean',
        ]);

        $parkingStatus->update($request->all());

        return redirect()->route('parking-statuses.index')
                         ->with('success', 'Parking Status updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingStatus $parkingStatus)
    {
        $parkingStatus->delete();

        return redirect()->route('parking-statuses.index')
                         ->with('success', 'Parking Status deleted successfully.');
    }
}
