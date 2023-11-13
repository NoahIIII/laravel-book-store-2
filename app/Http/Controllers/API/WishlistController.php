<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WishlistController extends Controller
{
    //
      public function index(){
        $user_id = Auth::guard('sanctum')->user()->id;
        $books_id = Wishlist::where('user_id',$user_id)->get('book_id');
        $books=[];
        foreach ($books_id as $book_id){
            $books[]=Book::where('id',$book_id->book_id)->get();
        }
        return response()->json(['books'=>$books]);
    }
    function store($id){
        $user_id = Auth::guard('sanctum')->user()->id;
        $data = [];
        $book_id = $id;
        $data['book_id'] = $book_id;
        $data['user_id'] = $user_id;

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return response()->json(['warning'=> 'الكتاب موجود بالفعل في المفضلة']);
        }

        Wishlist::create($data);
        return response()->json(['success'=>'تمت اضافة الكتاب الى المفضلة']);
    }

    function validator($data){
        return Validator::make($data,['book_id'=>['exists:books,id',Rule::unique('wishlist')->where(function ($query) use ($data) {
            return $query->where('user_id', $data['user_id']);
        })]]);
    }
    function destroy($book_id){
        $user_id = Auth::guard('sanctum')->user()->id;
        Wishlist::where('book_id',$book_id)->where('user_id',$user_id)->delete();
        return response()->json(['success'=>'تمت حذف الكتاب من المفضلة']);
    }
}
