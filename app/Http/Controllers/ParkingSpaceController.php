<?php

namespace App\Http\Controllers;

use App\Models\ParkingSpace;
use Illuminate\Http\Request;


class ParkingSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parkingSpaces = ParkingSpace::all();
        return view('parking_spaces.index', compact('parkingSpaces'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parking_spaces.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'status_id' => 'required|exists:parking_statuses,id',
        ]);

        ParkingSpace::create($request->all());

        return redirect()->route('parking-spaces.index')
                         ->with('success', 'Parking Space created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(ParkingSpace $parkingSpace)
    {
        return view('parking_spaces.show', compact('parkingSpace'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParkingSpace $parkingSpace)
    {
        return view('parking_spaces.edit', compact('parkingSpace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParkingSpace $parkingSpace)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'status_id' => 'required|exists:parking_statuses,id',
        ]);

        $parkingSpace->update($request->all());

        return redirect()->route('parking-spaces.index')
                         ->with('success', 'Parking Space updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingSpace $parkingSpace)
    {
        $parkingSpace->delete();

        return redirect()->route('parking-spaces.index')
                         ->with('success', 'Parking Space deleted successfully.');
    }
}
