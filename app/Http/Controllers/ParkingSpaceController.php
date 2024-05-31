<?php

namespace App\Http\Controllers;

use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class ParkingSpaceController extends Controller
{
    public function index()
    {
        // Fetch the parking statuses or spaces from the database
        $parkingStatuses = ParkingSpace::all();

        // Return the view with the parking statuses
        return view('parkingSpace.index', compact('parkingStatuses'));
    }

    public function create()
    {
        // Return the view for creating a new parking space
        return view('parking-spaces.create');
    }
    

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'location' => 'required|string|max:255',
            'area' => 'required|string|max:255',
        ]);

        // Create a new parking space
        parkingspace::create([
            'location' => $request->input('location'),
            'area' => $request->input('area'),
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('parking-spaces.index')->with('success', 'Parking Space created successfully.');
    }

    // Other methods for show, edit, update, destroy, etc.
}


