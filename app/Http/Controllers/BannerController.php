<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    //
    function index(){
        $banners =Banner::paginate(10);
        return view('dashboard.banners.index',['banners'=>$banners]);
    }
    function destroy($banner_id){
        Banner::findOrFail($banner_id)->delete();
        return redirect()->back()->with('success','Banner Deleted Successfully');
    }

    function edit($banner_id,Request $request){
        // $request
        $data['status']=$request->status;
        $validator=$this->edit_validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();

        }
       Banner::findOrFail($banner_id)->update($data);
        return redirect()->back()->with('success','Status Changed');
    }
    function edit_validator($data){
        return Validator::make($data, [
            'status'=>'between:0,1'
        ]);
    }
    function GetActiveBanners(){
        return Banner::where('status','1')->get();
    }
    function StoreImage($request)
    {
        $imagepath = $request->file('image')->store('uploads', 'public');
        return $imagepath;
    }
    function validator($data){
        return Validator::make($data, [
            'status' => ['required', 'between:0,1'],
            'image' => ['required','mimes:jpeg,png,jpg,gif','image'],
        ]);
    }
    function store(Request $request){
        $data = $request->except('_token');
        $validator = $this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image=$this->StoreImage($request);
        $data['image']=$image;
        Banner::create($data);
        return redirect()->back()->with('success','New Banner created');
    }
}
