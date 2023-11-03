<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrancheController extends Controller
{
    //
    public function index(){
        $branches = $this->GetBranches();
        return view('branches',['branches'=>$branches]);
    }
    function GetBranches(){
        return Branche::all();
    }
    function view(){
        $branches = Branche::paginate();
        return view('dashboard.branches.index',['branches'=>$branches]);
    }
    function update($id){
        $branche=Branche::find($id);
        return view('dashboard.branches.update',['branche'=>$branche]);
    }
    function validator($data){
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:40','min:3'],
            'phone' => ['required',  'max:255','min:3'],
            'email' => ['required', 'email', 'max:255'],
            'short_address' => ['required', 'max:255'],
            'full_address' => ['required','max:255'],
        ]);
    }
    function store(Request $request){
        $data=$request->except('_token');
        $validator=$this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Branche::create($data);
        return redirect()->back()->with('success','Branche Created Successfully');
    }
    function destroy($branch_id){
        Branche::findOrFail($branch_id)->delete();
        return redirect()->back()->with('success','Branche Deleted Successfully');

    }

    function edit(Request $request,$branch_id){
        $data=$request->except('_token','_method');
        $validator=$this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Branche::findOrFail($branch_id)->update($data);
        return redirect()->back()->with('success','Branche Updated Successfully');
    }
}
