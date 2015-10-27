<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\Redirect;
use Closure;
use App\Order;
use App\User;
use Auth;

class OrderUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $order_id = $request->segments()[1];
        $orderUser = Order::find($order_id)->user->id;

        if ($orderUser != Auth::user()->id)
        {
            return redirect('profile')->with('danger', 'This order is not associated with you.');
        }
        return $next($request);
    }
}
