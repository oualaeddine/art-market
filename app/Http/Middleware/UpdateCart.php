<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class UpdateCart
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
        if (auth()->guard('client')->check() && ! auth()->check()){
            $phone=auth()->guard('client')->user()->phone;
            Cart::restore($phone);
            Cart::store($phone);
        }
        return $next($request);
    }


//    public function terminate($request, $response)
//    {
//        if (auth()->guard('client')->check()){
//            $phone=auth()->guard('client')->user()->phone;
//            Cart::restore($phone);
//        }
//    }
}
