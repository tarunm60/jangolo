<?php

namespace App\Http\Middleware;

use Closure;
use App\Cart;

class CartProduct
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
        
        \Session::forget('product_count');

        $ip_add = $request->ip();
        
        if(\Auth::check())
        {
            $user = auth()->user();
            
            $product_count = Cart::where('user_id',$user['id'])->Orwhere('ip_address',$ip_add)->count();
        }
        else
        {
            
            $product_count = Cart::where('ip_address',$ip_add)->count();
            
        }

        \Session::put('product_count',$product_count);

        return $next($request);
    }
}
