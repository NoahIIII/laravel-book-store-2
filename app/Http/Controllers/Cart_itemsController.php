<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Cart_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cart_itemsController extends Controller
{

    function GetBooksInCart(){
        if(Auth::check()){

            $userId = Auth::user()->id;

            $books = Cart_items::whereHas('cart', function($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->join('books', 'cart_items.book_id', '=', 'books.id')
            ->select('cart_items.quantity', 'books.price','books.price_after_discount', 'books.name', 'books.image','cart_items.cart_id','books.id')
            ->get();


            return $books;
        }
    }
    function ItemsCount(){
        if(Auth::check()){

            $userId = Auth::user()->id;

            $productCount = Cart_items::whereHas('cart', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->count();

            return $productCount;
        }
        return 0;

    }
    function destroy($book_id,$cart_id,$price){

        $cart=Cart::where('id',$cart_id)->select('*')->get();
        // dd($cart[0]['id']);

        $cart[0]['total'] = $cart[0]['total']-$price;
        $data['total']=$cart[0]['total'];
        Cart::where('id',$cart_id)->update($data);
        Cart_items::where('cart_id',$cart_id)->where('book_id',$book_id)->delete();
        if($cart[0]['total']==0){
            Cart::where('id',$cart_id)->delete();
        }
        return redirect()->back()->with('success','تم حذف الكتاب من السلة');
    }

}
