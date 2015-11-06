<?php

namespace App\Http\Middleware;

use Closure;
use App\CreditCard;
use Auth;

class CreditCardUser
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
        $creditcardId = $request->segments()[2];
        $ccUser = CreditCard::find($creditcardId);

        if ($ccUser->user_id != Auth::user()->id)
        {
            return redirect('profile')->with('danger', 'This credit card is not associated with you.');
        }
        return $next($request);
    }
}
