<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')->withErrors(['You must be an admin to access this page.']);
        }

        return $next($request);
    }
}
