<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //
    function index(){
        $books=Book::paginate(15);
        return response()->json(['books'=>$books]);
    }

    function update($id){
        $book = Book::find($id);
        return response()->json(['book'=>$book]);
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
            return response()->json($validator);
        }
        $image=$this->StoreImage($request);
        $data['price_after_discount']=$data['price']- ($data['price']*$data['discount'] / 100);
        $data['best_seller']=0;
        $data['image']=$image;
        $data['code']=rand(20000,30000);
        Book::create($data);
        return response()->json(['success'=>'book created']);

    }

    function edit(Request $request,$book_id){
        $data = $request->except('_token','_method');
        $validator = $this->validator($data);
        $validator->validate();
        if($validator->fails()){
            return response()->json($validator);
        }
        $image=$this->StoreImage($request);
        $data['price_after_discount']=$data['price']- ($data['price']*$data['discount'] / 100);
        $data['best_seller']=0;
        $data['image']=$image;
        $data['code']=rand(20000,30000);
        Book::find($book_id)->update($data);
        return response()->json(['success'=>'book updated']);

    }
    function destroy($book_id){
        Book::find($book_id)->delete();
        return response()->json(['success'=>'book deleted']);
    }

    public function search(Request $request){
        $search=$request->search;
        $books=Book::where('name','like','%'.$search.'%')->paginate(15);
        return response()->json(['books'=>$books]);
    }
    public function GetBooksCount(){
        return Book::count();
    }
    public function HandleStock($book_id,$quantity){
        $book = Book::where('id',$book_id)->first();

        $data['stock']= ($book['stock'] - $quantity);

        if($data['stock']<0){
            return response()->json(['warning'=>'we do not have that quantity']);
        }

        return Book::where('id',$book_id)->update($data);
    }

}
