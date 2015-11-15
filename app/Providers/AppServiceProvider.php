<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use DB;
use View;
use Auth;
use App\Order;
use App\Shift;
use Illuminate\Contracts\Auth\Guard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        view()->composer('*', function($view){
          $view->with('currentUser', Auth::user());
        });

        view()->composer('sidebar.admin', function($view){
          $today = \Carbon\Carbon::today();
          $orders = DB::table('orders')
                        ->where('dateOrdered', '=', $today)
                        ->where('status_id', '=', 2)
                        ->count('id');
          $view->with('orders', $orders);
        });

        view()->composer('sidebar.admin', function($view){
          $today = date('l');
          $hours = DB::table('hours')
                        ->where('day', $today)
                        ->value('hours');
          $view->with('hours', $hours);
        });

        view()->composer('sidebar.admin', function($view){
          $date =  date('Y-m-d');
          $shift = Shift::where('date', $date)->pluck('id');
          $employeees = Shift::find($shift)->users()->count();
          $view->with('employeees', $employeees);
        });

            view()->composer('*', function($view) use ($auth){
                $user = Auth::user();
                if(Auth::user()) {
                    $cart = DB::table('orders')
                        ->select('id')
                        ->where('status_id', '=', 1)
                        ->where('user_id', '=', $user->id)
                        ->value('id');

                    $cartItems = DB::table('order_products')->where('order_id', '=', $cart)->sum('quantity');
                    $view->with('cartItems', $cartItems);    
                }                
            });

        
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
