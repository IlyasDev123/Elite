<?php

namespace App\Http\Middleware;

use Closure;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check() || !in_array(Auth::guard('admin')->user()->type, [1, 3, 4])) {
            return redirect()->route('getLogin');
        }
        return $next($request);
    }
}
