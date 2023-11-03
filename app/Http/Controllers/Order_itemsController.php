<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Cart_items;
use App\Models\Order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order_itemsController extends Controller
{
    function GetOrderItemsData($order_id){

        $cart_id= Cart::where('user_id',Auth::user()->id)->select('id','total')->get();
        $cart_items=Cart_items::where('cart_id',$cart_id[0]['id'])->select('book_id','quantity','price')->get();
        $data=[];
        foreach($cart_items as $key => $cart_item){
            $item=$cart_item;
            $data[$key]= $item;
            $data[$key]['order_id']=$order_id;
        }
        return $data;
    }

        // dd($data[0]);
        function store($data){
            foreach($data as $key => $value){
                // echo $value['price'];
                // dd($value);
                $row['price']=$value['price'];
                $row['book_id']=$value['book_id'];
                $row['order_id']=$value['order_id'];
                $row['quantity']=$value['quantity'];
                // dd($row);
                // Order_items::create($data);
                DB::table('order_items')->insert($row);
            }
        }




}
