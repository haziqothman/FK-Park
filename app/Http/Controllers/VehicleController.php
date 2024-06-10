<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all(); // Retrieve all vehicles from the database
        \Log::info('test');
        return view('vehicle.index', ['vehicles' => $vehicles]); // Pass the vehicles data to the view
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create'); // Return a view to create a new vehicle
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info('Store~method called');
        
        // Validate the incoming request data
        $validatedData = $request->validate([
            'plate_number' => 'required|unique:vehicles',
            'model' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
        ]);

        \Log::info('Validated data:', $validatedData);

        // Create a new Vehicle instance and fill it with validated data
        $vehicle = new Vehicle();
        $vehicle->user_id = auth()->id(); // Assuming you're storing the authenticated user's ID
        $vehicle->plate_number = $validatedData['plate_number'];
        $vehicle->vehicle_type = $validatedData['vehicle_type'];
        $vehicle->model = $validatedData['model'];
        $vehicle->color = $validatedData['color'];

        // Save the vehicle to the database
        $vehicle->save();

        \Log::info('Vehicle saved:', $vehicle->toArray());

        // Redirect back with success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle registered successfully.');
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id); // Retrieve the vehicle by its ID or fail
        return view('vehicle.edit', ['vehicle' => $vehicle]); // Return a view to edit the vehicle
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Log::info('Update method called');
        
        // Validate the incoming request data
        $validatedData = $request->validate([
            'plate_number' => 'required|unique:vehicles,plate_number,'.$id,
            'model' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
        ]);

        \Log::info('Validated data:', $validatedData);

        // Retrieve the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);

        // Update the vehicle with validated data
        $vehicle->plate_number = $validatedData['plate_number'];
        $vehicle->vehicle_type = $validatedData['vehicle_type'];
        $vehicle->model = $validatedData['model'];
        $vehicle->color = $validatedData['color'];

        // Save the updated vehicle to the database
        $vehicle->save();

        \Log::info('Vehicle updated:', $vehicle->toArray());

        // Redirect back with success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified vehicle from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Log::info('Destroy method called');

        // Retrieve the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);

        // Delete the vehicle
        $vehicle->delete();

        \Log::info('Vehicle deleted:', $vehicle->toArray());

        // Redirect back with success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}