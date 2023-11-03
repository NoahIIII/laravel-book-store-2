<?php

namespace App\Providers;

use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Cart_itemsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('layout.head', function ($view) {
            if(Auth::check()){

                $homeController = new HomeController();
                $fav_count = $homeController->NumberOfFav();
                $cart_items = new Cart_itemsController();
                $books = $cart_items->GetBooksInCart();
                $cart= new CartController();
                $total = $cart->GetCartPrice();
                if($cart->CheckCart()){
                    $check= true;
                }
                else{
                    $check = false;
                }
                $number=$cart_items->ItemsCount();
                $view->with(['fav_count'=> $fav_count,'books'=>$books,'total'=>$total,'check'=>$check,'n_products'=>$number]);
            }
            });
            View::composer('*',function($view){
                $cat=new CategoryController();
                $categories=$cat->view();
                $view->with(['categories'=>$categories]);
            });
            View::composer('layout.footer',function ($view){
                $new_branches = new BrancheController();
                $branches = $new_branches->GetBranches();
                $view->with(['branches'=>$branches]);
            });


    }
}
