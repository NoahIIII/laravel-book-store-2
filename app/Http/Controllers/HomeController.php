<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function index(){
        $books=Book::OrderBy('discount','desc')->take(15)->get();
        $topbooks = Book::orderBy('best_seller', 'desc')->take(15)->get();
        $newbooks = Book::orderBy('created_at','desc')->take(15)->get();
        $banner= new BannerController();
        $banners = $banner->GetActiveBanners();

        return view('index',['books'=>$books,'topbooks'=>$topbooks,'newbooks'=>$newbooks,'banners'=>$banners]);
    }
    function SingleProduct($id){
        $book=Book::find($id);
        $rel_books=Book::limit(4)->get();
        $may_book=Book::limit(1)->get();
        // dd($may_book);
        return view('single-product',['book'=>$book,'rel_books'=>$rel_books,'may_book'=>$may_book]);
    }
    function NumberOfFav(){
        if(auth()->check()){

            $user_id = Auth::user()->id;
            $books_id = Wishlist::where('user_id',$user_id)->get('book_id');
            return count($books_id);
        }

        return 0;
    }
    function shop($category_id){
        if($category_id =='all'){

            $books= Book::paginate(24);
            return view('shop',['books'=>$books]);
        }
        $books= Book::where('category_id',$category_id)->paginate(24);
        return view('shop',['books'=>$books]);

    }
}
