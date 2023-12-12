<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Cart_items;
use App\Models\Order;
use App\Models\Order_items;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    function store(Request $request)
    {
        $data = $this->GetOrderData();
        $order = Order::create($data);
        $order_items = new Order_itemsController();
        $order_items->store($order_items->GetOrderItemsData($order->id));
        $invoice = new InvoiceController();
        $total = $order->total_after_discount;
        $order_id = $order->id;
        $invoice->store($request, $order_id, $total);
        $cart = new CartController();
        $cart->destroy();
        return redirect()->to(route('checkout',$data));
    }
    function GetOrderData()
    {
        $cart_id = Cart::where('user_id', Auth::user()->id)->select('id', 'total')->get();
        $cart_items = Cart_items::where('cart_id', $cart_id[0]['id'])->select('book_id')->get();
        $price = [];
        foreach ($cart_items as $key => $cart_item) {
            $book = Book::where('id', $cart_item['book_id'])->select('price')->get();
            $price[] = $book[0]['price'];
        }
        $data['total'] = 0;
        foreach ($price as $value) {

            $data['total'] = $data['total'] + $value;
        }
        $data['user_id'] = Auth::user()->id;
        $data['total_after_discount'] = $cart_id[0]['total'];
        $data['status'] = "pending";
        return $data;
    }
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('orders', ['orders' => $orders]);

    }

    public function Checkout()
    {
        $cart_items = new Cart_itemsController();
        $items= $cart_items->GetBooksInCart();
        $total_after_discount=0;
        $total=0;
        foreach($items as $item){
            $total=$total+$item['price'];
            $total_after_discount=$total_after_discount+$item['price_after_discount'];
        }

        return view('checkout',['books'=>$items,'total_after_discount'=>$total_after_discount,'total'=>$total]);
    }
    function OrderRecieved()
    {
        return view('order-recieved');
    }
    function OrderDetails($order_id)
    {
        $books = \Illuminate\Support\Facades\DB::table('order_items')
        ->join('books', 'order_items.book_id', '=', 'books.id')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('order_items.order_id', '=', $order_id)
        ->select('books.name', 'books.image', 'order_items.price', 'order_items.quantity', 'orders.total','books.id')
        ->get();
        $invoice = new InvoiceController();
        $invoice_data=$invoice->index($order_id);
        return view('order-details',['books'=>$books,'invoice'=>$invoice_data]);
    }
    function vieworders()
    {
        $orders = Order::paginate();
        return view('dashboard.orders.index', ['orders' => $orders]);
    }
    function ConfirmOrder($order_id){
        Order::where('id', $order_id)->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Order Confirmed');
    }
    function destroy($order_id){
        Order::where('id', $order_id)->delete();
        return redirect()->back()->with('success', 'Order Deleted');
    }
    function GetTodayOrders(){
        $today = date('Y-m-d');
        $orders = Order::where('created_at', 'like', $today . '%')->count();
        return $orders;
    }
}
