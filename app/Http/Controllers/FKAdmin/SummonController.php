<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summon;

class SummonController extends Controller
{
    //here create all crud logic
    public function list(){
        return view('admin.summonmanage');
    }

    public function add(){
        return view('admin.add-summon');
    }

    public function insert(Request $request){
        $request->validate([
            'id'=> 'required',
            'summonCategory'=> 'required|email|unique:users',
            'summonAmount'=> 'required',
            'demeritPoint'=>'required'
        ]);
        try {
             // register user here
            $summon = new Summon();
            $summon->id = trim($request->id);
            $summon->summonCategory = trim($request->summonCategory);
            $summon->summonAmount = trim($request->summonAmount);
            $summon->demeritPoint = trim($request->demeritPoint);
            $summon->save();

            return redirect('admin.summonmanage')->with('success','New Summon Issued Successfully');
        } catch (\Exception $e) {
            return redirect('admin.add-summon')->with('fail',$e->getMessage());
        }
    }
}
