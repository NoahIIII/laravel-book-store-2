<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branche;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    public function index(){
        $branches = $this->GetBranches();
        return response()->json(['branches'=>$branches]);
    }
    function GetBranches(){
        return Branche::all();
    }
    function view(){
        $branches = Branche::paginate();
        return response()->json(['branches'=>$branches]);
    }
    function update($id){
        $branche=Branche::find($id);
        return response()->json(['branche'=>$branche]);
    }
    function validator($data){
        return \Illuminate\Support\Facades\Validator::make($data,[
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
            return response()->json($validator);
        }
        Branche::create($data);
        return response()->json(['success'=>'Branche created']);
    }
    function destroy($branch_id){
        Branche::findOrFail($branch_id)->delete();
        return response()->json(['success'=>'Branche Deleted Successfully']);

    }

    function edit(Request $request,$branch_id){
        $data=$request->except('_token','_method');
        $validator=$this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return response()->json($validator);
        }
        Branche::findOrFail($branch_id)->update($data);
        return response()->json(['success'=>'Branche Updated Successfully']);
    }
}
