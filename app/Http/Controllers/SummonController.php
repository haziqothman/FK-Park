<?php

namespace App\Http\Controllers;

use App\Models\Summon;
use Illuminate\Http\Request;

class SummonController extends Controller
{
    //here create all crud logic
    public function loadAllSummon(){
        $all_summon = Summon::all();
        return view('admin/summonmanage',compact('all_summon'));
    }

    public function loadAddSummonForm(){
        return view('admin/add-summon');
    }

    public function AddSummon(Request $request){
        $request->validate([
            'id'=> 'required',
            'summonCategory'=> 'required',
            'summonAmount'=> 'required',
            'demeritPoint'=>'required'
        ]);
        try {
             // register user here
            $new_summon = new Summon();
            $new_summon->id = $request->id;
            $new_summon->summonCategory = $request->summonCategory;
            $new_summon->summonAmount = $request->summonAmount;
            $new_summon->demeritPoint = $request->demeritPoint;
            $new_summon->save();

            return redirect('/admin/summonmanage')->with('success','Summon Added Successfully');
        } catch (\Exception $e) {
            return redirect('/admin/add-summon')->with('fail',$e->getMessage());
        }
    }

    public function EditSummon(Request $request){
        // perform form validation here
        $request->validate([
            'id'=> 'required',
            'summonCategory'=> 'required',
            'summonAmount'=> 'required',
            'demeritPoint'=>'required'
        ]);
        try {
             // update user here
            $update_user = Summon::where('summonID',$request->summonID)->update([
                'summonCategory' => $request->summonCategory,
                'summonAmount' => $request->summonAmount,
                'demeritPoint' => $request->demeritPoint,
            ]);

            return redirect('/admin/summonmanage')->with('success','User Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/summon')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = Summon::find($id);

        return view('admin/edit-summon',compact('summon'));
    }

    public function deleteUser($id){
        try {
            Summon::where('id',$id)->delete();
            return redirect('/admin/summonmanage')->with('success','Summon Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/admin/summonmanage')->with('fail',$e->getMessage());
            
        }
    }
}
