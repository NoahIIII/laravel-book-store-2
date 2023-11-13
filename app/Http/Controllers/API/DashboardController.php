<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function index(){

        $order = new OrderController();
        $orders = $order->GetTodayOrders();
        $user = new UserController();
        $users = $user->GetToDayUsers();
        $contact = new ContactController();
        $contacts = $contact->GetTodayMessages();
        $book = new BookController();
        $books = $book->GetBooksCount();
        return response()->json(['orders'=>$orders,'users'=>$users,'contacts'=>$contacts,'books'=>$books]);
    }
}
