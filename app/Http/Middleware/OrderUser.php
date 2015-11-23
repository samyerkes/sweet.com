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
        $orderUser = $request->user();

        if ($orderUser->id != Auth::user()->id) {
            return redirect('profile')->with('danger', 'This order is not associated with you.');
        }
        return $next($request);
    }
}
