<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    function index(){
        $categories = Category::paginate(1);
        return view('dashboard.categories.index',['categories'=>$categories]);
    }
    // update
    function update($id){
        //
        $category = Category::find($id);
        return view('dashboard.categories.update',['category'=>$category]);
    }
    function view(){
        return Category::get();
    }
    function destroy($category_id){
        Category::find($category_id)->delete();
        return redirect()->back()->with('success','category deleted');
    }
    function validator($data){
       return Validator::make($data, [
            'name'=>'required|unique:categories,name|max:100|min:2'
        ]);
    }
    function store(Request $request){
        $data=$request->except('_token');
        $validator = $this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Category::create($data);
        return redirect()->back()->with('success','category added');
    }

    function edit($category_id,Request $request){
        $data=$request->except('_token');
        $validator = $this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Category::find($category_id)->update($data);
        return redirect()->back()->with('success','category updated');
    }
}
