<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //import this for password hashing

class UserController extends Controller
{
    //here create all crud logic
    public function list(){
        dd('test');
        $getRecord= User::getRecord();
        return view('admin.usermanage', compact('getRecord'));
    }

    public function add(){
        return view('admin/add-user');
    }

    public function insert(Request $request){
        $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8',
            'userType'=>'required|string'
        ]);
        try {
             // register user here
            $user = new User;
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->userType = trim($request->userType);
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('admin.usermanage')->with('success','User Added Successfully');
        } catch (\Exception $e) {
            return redirect('admin.add-user')->with('fail',$e->getMessage());
        }
    }

    public function AddUser(Request $request){
        $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8',
            'userType'=>'required|string'
        ]);
        try {
             // register user here
            $new_user = new User();
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->userType = $request->userType;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('/admin/usermanage')->with('success','User Added Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/add-user')->with('fail',$e->getMessage());
        }
    }

    public function EditUser(Request $request){
        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'userType' => 'required',
        ]);
        try {
             // update user here
            $update_user = User::where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'userType' => $request->userType,
            ]);

            return redirect('/admin/usermanage')->with('success','User Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/user')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = User::find($id);

        return view('admin/edit-user',compact('user'));
    }

    public function deleteUser($id){
        try {
            User::where('id',$id)->delete();
            return redirect('/admin/usermanage')->with('success','User Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/admin/usermanage')->with('fail',$e->getMessage());
            
        }
    }
}
