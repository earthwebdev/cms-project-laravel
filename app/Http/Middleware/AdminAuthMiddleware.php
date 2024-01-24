<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            if(!auth()->user()->is_admin){
                $request->session()->flash('error', 'You have to be admin user to access this page');
                return redirect()->route('backend.login');
            }

        } else{
            $request->session()->flash('error', 'You have to login to access this page');
            return redirect()->route('backend.login');
        }
        return $next($request);
    }
}
