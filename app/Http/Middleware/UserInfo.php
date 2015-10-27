<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserInfo
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
        $requestID = $request->segments()[1];

        if ($requestID != Auth::user()->id)
        {
            return redirect('profile')->with('danger', 'You do not have access to update this information');
        }
        return $next($request);
    }
}
