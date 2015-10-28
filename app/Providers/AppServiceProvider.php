<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use DB;
use View;
use Auth;
use App\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
          $view->with('currentUser', Auth::user());
        });

        // view()->composer('*', function($view){
        //     $user = Auth::User();
        //     $cart = DB::table('orders')
        //              ->select('id')
        //              ->where('status_id', '=', 1)
        //              ->where('user_id', '=', $user->id)
        //              ->value('id');
        //     $view->with('cart', $items = Order::find($cart)->product()->count());
        // });    
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
