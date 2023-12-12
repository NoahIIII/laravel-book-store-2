<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    //
    function index()
{
    // Check if the data is already cached
    // $data = Cache::remember('index_data', 60 * 24, function () {
        // Cache for 24 hours (60 minutes * 24 hours)

        $books = Book::where('status', 1)->orderBy('discount', 'desc')->take(15)->get();
        $topbooks = Book::where('status', 1)->orderBy('best_seller', 'desc')->take(15)->get();
        $newbooks = Book::where('status', 1)->orderBy('created_at', 'desc')->take(15)->get();

        $banner = new BannerController();
        $banners = $banner->GetActiveBanners();

        return view('index',compact('books', 'topbooks', 'newbooks', 'banners'));
    // });

    // return view('index', $data);
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
