<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Cart;
use App\Countries;
use App\Product;

class CheckoutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCheckout(Request $request)
    {
        if(\Auth::check())
        {
            $user = auth()->user();

            $cart_data = Cart::where('user_id',$user['id'])->get()->toArray();
        }
        else
        {
            $ip_add = $request->ip();
            
            $cart_data = Cart::where('ip_address',$ip_add)->get()->toArray();
        }
        
        $product_detail = '';
        

        $total_amount = 0;

        foreach ($cart_data as $key => $single_product) {
            
            $product_data = Product::find($single_product['product_id']);

            $product_data['quantity'] = $single_product['quantity'];
            
            $product_data['subTotal'] = $single_product['quantity'] * $product_data['sale_price'];
        
            $total_amount = $total_amount + $product_data['subTotal'];
            
            $product_detail[] = $product_data;
        }
       
        $country = ['Cameroon'=>'Cameroon'] + Countries::orderBy('en','asc')->pluck('en','en')->toArray();

        return view('farm.checkout',compact('product_detail','country','total_amount'));
    }

    public function placeOrder(CheckoutRequest $request)
    {
        // dd($request->all());
        return redirect()->route('thank.you');
    }

    public function thankYou()
    {
        return view('farm.thank_you');
    }

}
