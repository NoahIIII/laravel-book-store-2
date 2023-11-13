<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Wishlist;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $books=Book::where('status',1)->OrderBy('discount','desc')->take(15)->get();
        $topbooks = Book::where('status',1)->orderBy('best_seller', 'desc')->take(15)->get();
        $newbooks = Book::where('status',1)->orderBy('created_at','desc')->take(15)->get();
        $banner= new BannerController();
        $banners = $banner->GetActiveBanners();

        return response()->json(['books'=>$books,'topbooks'=>$topbooks,'newbooks'=>$newbooks,'banners'=>$banners]);
    }
    function SingleProduct($id){
        $book=Book::find($id);
        $rel_books=Book::limit(4)->get();
        $may_book=Book::limit(1)->get();
        // dd($may_book);
        return response()->json(['book'=>$book,'rel_books'=>$rel_books,'may_book'=>$may_book]);
    }
    function NumberOfFav(){
        if(auth()->check()){

            $user_id = \Illuminate\Support\Facades\Auth::user()->id;
            $books_id = Wishlist::where('user_id',$user_id)->get('book_id');
            return count($books_id);
        }

        return 0;
    }
    function shop($category_id){
        if($category_id =='all'){

            $books= Book::paginate(24);
            return response()->json(['books'=>$books]);
        }
        $books= Book::where('category_id',$category_id)->paginate(24);
        return response()->json(['books'=>$books]);

    }
}
