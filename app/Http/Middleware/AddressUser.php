<?php

namespace App\Http\Middleware;

use Closure;
use App\Address;
use Auth;

class AddressUser
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
        $addressId = $request->segments()[2];
        $addrUser = Address::find($addressId);

        if ($addrUser->user_id != Auth::user()->id)
        {
            return redirect('profile')->with('danger', 'This address is not associated with you.');
        }
        return $next($request);
    }
}
