<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        return view('dashboard.index',['orders'=>$orders,'users'=>$users,'contacts'=>$contacts,'books'=>$books]);
    }
    function createbook(){
        return view('dashboard.books.create');
    }

    function useractions(){
        return view('dashboard.users.actions');
    }
    function createuser(){
        return view('dashboard.users.create');
    }
    function UpdateUser()
    {
        return view('dashboard.users.update');
    }
    function CreateCategory(){
        return view('dashboard.categories.create');
    }
    function categoryactions(){
        return view('dashboard.categories.actions');
    }
    function UpdateCategory(){
        return view('dashboard.categories.update');
    }
    function CreateBranche(){
        return view('dashboard.branches.create');
    }
    function brancheactions(){
        return view('dashboard.branches.actions');
    }
    function createbanner(){
        return view('dashboard.banners.create');
    }
    function banneractions(){
        return view('dashboard.banners.actions');
    }

}
