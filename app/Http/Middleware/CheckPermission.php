<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        $user = Auth::user();

        if (!$user || !$user->hasAnyPermission($permissions)) {
            return redirect()->route('not-allowed');
        }

        return $next($request);
    }
}
