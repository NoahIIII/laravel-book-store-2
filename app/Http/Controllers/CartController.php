<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Cart_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function Add($id, Request $request)
    {
        // $data['id'] = $id;
        $book['id']=$id;
        $validator = $this->validator($book, 'books');
        $validator->validate();
        if ($validator->fails()) {
            return redirect()->back()->with('warning', 'الكتاب غير متاح');
        }
        $handle_stock= new BookController();
        $data['user_id'] = Auth::user()->id;
        $price = \App\Models\Book::where('id', $id)->get('price_after_discount');
        $item_data['quantity'] = $request->quantity;
        $handle_stock->HandleStock($id,$item_data['quantity']);
        $item_data['price'] = $price[0]['price_after_discount'] * $item_data['quantity'];
        $data['total'] = $item_data['quantity'] * $item_data['price'];

        $item_data['book_id'] = $id;
        if (!$this->HandleCart()) {
            $cart = Cart::create($data);
            $item_data['cart_id'] = $cart->id;
            Cart_items::create($item_data);
            return redirect()->back()->with('success', 'تمت الاضافة للسلة بنجاح');
        } else {
            $cart_id = Cart::where('user_id', Auth::user()->id)->get('id');
            $item_data['cart_id'] = $cart_id[0]['id'];
            if ($this->CheckBookInCartItems($id,$item_data['cart_id'])) {
                $cart_items = Cart_items::where('cart_id', $item_data['cart_id'])->get();
                $item_data['quantity'] = $item_data['quantity'] + $cart_items[0]['quantity'];
                $item_data['price'] = $item_data['price'] + $cart_items[0]['price'];
                Cart_items::where('cart_id', $item_data['cart_id'])->update($item_data);
                $total = $this->total();
                $data['total'] = $total;
                Cart::where('user_id', Auth::user()->id)->update($data);
                return redirect()->back()->with('success', 'تمت الاضافة للسلة بنجاح');
            }
            Cart_items::create($item_data);
            $total = $this->total();
            $data['total'] = $total;
            Cart::where('user_id', Auth::user()->id)->update($data);
            return redirect()->back()->with('success', 'تمت الاضافة للسلة بنجاح');
        }
    }
    function HandleCart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get('id');
        if (!empty($cart[0])) {
            $total = $this->total();
            $data['total'] = $total;
            Cart::where('user_id', Auth::user()->id)->update($data);
            return true;
        }
        return false;
    }
    function validator($data, $table)
    {
        return \Illuminate\Support\Facades\Validator::make($data, [
            'id' => "exists:$table,id",

        ]);
    }
    function total()
    {
        $cart_id = Cart::where('user_id', Auth::user()->id)->get('id');
        $total = 0;
        $total = Cart_items::where('cart_id', $cart_id[0]['id'])->sum('price');
        return $total;
    }
    function CheckBookInCartItems($book_id,$cart_id)
    {
        $result = Cart_items::where('cart_id',$cart_id)->where('book_id',$book_id)->exists();
        if ($result) {
            return true;
        }
        return false;
    }
    function GetCartPrice(){
        if($this->CheckCart()){

            $price = Cart::where('user_id', Auth::user()->id)->get();
            return $price[0]['total'];
        }
        else return 0;
    }
    function CheckCart(){
        $cart = Cart::where('user_id', Auth::user()->id)->get('id');
        if (!empty($cart[0])) {
            return true;
        }
        return false;
    }
    function destroy(){
        Cart::where('user_id',Auth::user()->id)->delete();
    }
}
