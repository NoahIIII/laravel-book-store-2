<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //
    function index(){
        $books=Book::paginate(15);
        return view('dashboard.books.index',['books'=>$books]);
    }
    function actions(){
        return view('dashboard.books.actions');
    }
    function update($id){
        $book = Book::find($id);
        return view('dashboard.books.update',['book'=>$book]);
    }
    function validator($data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'author'=>['required','string','max:255'],
            'description'=>['required'],
            'discount'=>['required','numeric'],
            'price' => ['required', 'numeric'],
            'category_id'=>['required','exists:categories,id'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock'=>['required','numeric'],
            'number_of_pages'=>['required','numeric'],
            'status'=>'required'
        ]);
    }
    function StoreImage($request)
    {
        $imagepath = $request->file('image')->store('uploads', 'public');
        return $imagepath;
    }
    function store(Request $request){
        $data = $request->except('_token');
        $validator = $this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image=$this->StoreImage($request);
        $data['price_after_discount']=$data['price']- ($data['price']*$data['discount'] / 100);
        $data['best_seller']=0;
        $data['image']=$image;
        $data['code']=rand(20000,30000);
        Book::create($data);
        return redirect()->back()->with('success','book created');

    }

    function edit(Request $request,$book_id){
        $data = $request->except('_token','_method');
        $validator = $this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image=$this->StoreImage($request);
        $data['price_after_discount']=$data['price']- ($data['price']*$data['discount'] / 100);
        $data['best_seller']=0;
        $data['image']=$image;
        $data['code']=rand(20000,30000);
        Book::find($book_id)->update($data);
        return redirect()->back()->with('success','book updated');

    }
    function destroy($book_id){
        Book::find($book_id)->delete();
        return redirect()->back()->with('success','book deleted');
    }

    public function search(Request $request){
        $search=$request->search;
        $books=Book::where('name','like','%'.$search.'%')->paginate(15);
        return view('search',['books'=>$books]);
    }
    public function GetBooksCount(){
        return Book::count();
    }


}
