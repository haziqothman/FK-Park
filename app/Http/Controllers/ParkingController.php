<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Hash; //import this for password hashing

class ParkingController extends Controller
{
    //here create all crud logic
    public function loadAllParking(){
        $all_parkings = Parking::all();
        return view('admin/parkingmanage',compact('all_parkings'));
    }

    public function loadAddParkingForm(){
        return view('admin/add-parking');
    }

    public function AddParking(Request $request){
        $request->validate([
            'location'=> 'required|string',
            'created_at'=>'required|timestamp',
            'updated_at'=>'required|timestamp',
        ]);
        try {
             // register user here
            $new_parking = new Parking();
            $new_parking->location = $request->location;
            $new_parking->created_at = $request->created_at;
            $new_parking->updated_at = $request->updated_at;
            $new_parking->save();

            return redirect('/admin/parkingmanage')->with('success','Parking Added Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/add-parking')->with('fail',$e->getMessage());
        }
    }

    public function EditParking(Request $request){
        // perform form validation here
        $request->validate([
            'location'=> 'required|string',
            'created_at'=>'required|timestamp',
            'updated_at'=>'required|timestamp',
        ]);
        try {
             // update user here
            $update_parking = Parking::where('id',$request->id)->update([
                'location' => $request->location,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
            ]);

            return redirect('/admin/parkingmanage')->with('success','ParkingUpdated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/parking')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = Parking::find($id);

        return view('admin/edit-parking',compact('parking'));
    }

    public function deleteUser($id){
        try {
            Parking::where('id',$id)->delete();
            return redirect('/admin/parkingmanage')->with('success','Parking Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/admin/parkingmanage')->with('fail',$e->getMessage());
            
        }
    }
}
