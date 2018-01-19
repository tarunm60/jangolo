<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Order;
use App\Orderitem;
use App\Orders;
use App\Newsletter;
use App\Product;
use App\Cart;
use App\Wishlist;
use App\Sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->currency = \Session::get('currency');
       $this->default_currency = config('currency.default');
    }

    public function getCart(Request $request)
    {
        $ip_add = $request->ip();
        $user = auth()->user();

        if(Auth::check())
        {
            
            $cart_data = Cart::where('user_id',$user['id'])->Orwhere('ip_address',$ip_add)->get()->toArray();
        
        }
        else
        {
            
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

        return view('farm.cart',compact('product_detail','total_amount'));
    }

    public function addCart(Request $request)
    {
        \Session::forget('product_count');
        
        $request_data = $request->all();

        if(array_key_exists('quantity', $request_data))
        {
            $qty = $request_data['quantity'];
        }
        else
        {
            $qty = 1;
        }

        $product_detail = Product::find($request_data['product_id']);

        $ip_add = $request->ip();

        if(Auth::check())
        {
            $user = auth()->user();
 
            $data = [
                'user_id'       =>  $user['id'],
                'ip_address'    =>  null,
                'session_id'    =>  null,
                'product_id'    =>  $request_data['product_id'],
                'quantity'      =>  $qty,
                'price'         =>  $product_detail['sale_price']
            ];

            $cart_data = Cart::where('user_id',$user['id'])->where('product_id',$request_data['product_id'])->first();
			
			Wishlist::where('user_id',$user['id'])
	                    ->where('product_id',$request_data['product_id'])
	                    ->delete();
						
            if(isset($cart_data))
            {
                $qty = $cart_data['quantity'] + $qty;

                Cart::where('ip_address',$ip_add)->where('product_id',$request_data['product_id'])->update(['quantity' => $qty]);
            }
            else{
                Cart::firstOrCreate($data);
            }
        }
        else
        {
            $session = session()->getId();
 
            $data = [
                'user_id'       =>  null,
                'ip_address'    =>  $ip_add,
                'session_id'    =>  $session,
                'product_id'    =>  $request_data['product_id'],
                'quantity'      =>  $qty,
                'price'         =>  $product_detail['sale_price']
            ];

            $cart_data = Cart::where('ip_address',$ip_add)->where('product_id',$request_data['product_id'])->first();

			if(isset($cart_data))
            {
                $qty = $cart_data['quantity'] + $qty;

                Cart::where('ip_address',$ip_add)->where('product_id',$request_data['product_id'])->update(['quantity' => $qty]);
            }
            else{
                Cart::firstOrCreate($data);
            }
        }

        //--------Count of Product------------
        if(Auth::check())
        {
            $user = auth()->user();
 
            $product_count = Cart::where('user_id',$user['id'])->count();
            
            if(isset($product_count)){
                $product_count = $product_count;
            }
            else{
                $product_count = 0;
            }
            \Session::put('product_count',$product_count);            

        }
        else
        {
            $ip_add = request()->ip();
            
            $session = session()->getId();
 
            $product_count = Cart::where('ip_address',$ip_add)->count();
            
            if(isset($product_count)){
                $product_count = $product_count;
            }
            else{
                $product_count = 0;
            }
            \Session::put('product_count',$product_count);            
        }
        //-------------------------------------
        
        if(array_key_exists('quantity', $request_data))
        {
            return redirect()->route('get.cart')->with('message','Product Added to Cart.')
                                ->with('message_type','success');
        }
        else
        {
            return response()->json(['success' => true,'product_count' => $product_count],200);
        }
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        
        $user = auth()->user();
		
		$ip_add = request()->ip();
		
        if(Auth::check())
        {

            if($data['qty'] == 0)
            {
                Cart::where('user_id',$user['id'])
                    ->where('product_id',$data['product_id'])
                    ->delete();
            }
            else
            {
                Cart::where('user_id',$user['id'])
                    ->where('product_id',$data['product_id'])
                    ->update(['quantity' => $data['qty']]);
            }
            
            $product_count = Cart::where('user_id',$user['id'])->count();

            $product_detail = Cart::where('user_id',$user['id'])
                                ->where('product_id',$data['product_id'])->first();

            $product_detail['subTotal'] = $product_detail['quantity'] * $product_detail['price']; 
            
            $product_detail['price'] = currency($product_detail['price'],$this->default_currency,$this->currency);

            $product_detail['subTotal'] = currency($product_detail['subTotal'],$this->default_currency,$this->currency);

            $cart_data = Cart::where('user_id',$user['id'])->Orwhere('ip_address',$ip_add)->get()->toArray();

            $total_amount = 0;
            
            foreach ($cart_data as $key => $value) {
                
                $productTotal = $value['price'] *  $value['quantity']; 

                $total_amount = $total_amount + $productTotal;

            }                   
            $product_detail['total_amount'] = currency($total_amount,$this->default_currency,$this->currency);
        }
        else
        {
            $ip_add = $request->ip();
            
            if($data['qty'] == 0)
            {
                Cart::where('ip_address',$ip_add)
                    ->where('product_id',$data['product_id'])
                    ->delete();
            }
            else
            {
                Cart::where('ip_address',$ip_add)
                    ->where('product_id',$data['product_id'])
                    ->update(['quantity' => $data['qty']]);    
            }

            $product_count = Cart::where('ip_address',$ip_add)->count();

            $product_detail = Cart::where('ip_address',$ip_add)
                                ->where('product_id',$data['product_id'])->first();
            
            $product_detail['subTotal'] = $product_detail['quantity'] * $product_detail['price']; 
            
            $product_detail['price'] = currency($product_detail['price'],$this->default_currency,$this->currency);
            
            $product_detail['subTotal'] = currency($product_detail['subTotal'],$this->default_currency,$this->currency);
             
            $cart_data = Cart::where('user_id',$user['id'])->Orwhere('ip_address',$ip_add)->get()->toArray();

            $total_amount = 0;
            
            foreach ($cart_data as $key => $value) {
                
                $productTotal = $value['price'] *  $value['quantity']; 

                $total_amount = $total_amount + $productTotal;

            }                   
            $product_detail['total_amount'] = currency($total_amount,$this->default_currency,$this->currency);

        }
        
        return response()->json(['success' => true,'product_detail' => $product_detail,'product_count' => $product_count],200);
    }

    public function deleteCart(Request $request)
    {
        $productId = $request->get('product_id');

        $user = auth()->user();
                
        $ip_add = $request->ip();
        
        if(Auth::check())
        {
            Cart::where('user_id',$user['id'])
                    ->where('product_id',$productId)
                    ->delete();
        }
        else
        {
 
            Cart::where('ip_address',$ip_add)
                    ->where('product_id',$productId)
                    ->delete();
        }

        //--------Count of Product------------
        if(Auth::check())
        {
 
            $product_count = Cart::where('user_id',$user['id'])->count();
            
            if(isset($product_count)){
                $product_count = $product_count;
            }
            else{
                $product_count = 0;
            }
            \Session::put('product_count',$product_count);            

        }
        else
        {
            
            $session = session()->getId();
 
            $product_count = Cart::where('ip_address',$ip_add)->count();
            
            if(isset($product_count)){
                $product_count = $product_count;
            }
            else{
                $product_count = 0;
            }
            \Session::put('product_count',$product_count);            
        }
        //-------------------------------------

        $cart_data = Cart::where('user_id',$user['id'])->Orwhere('ip_address',$ip_add)->get()->toArray();

        $total_amount = 0;
        
        foreach ($cart_data as $key => $value) {
            
            $productTotal = $value['price'] *  $value['quantity']; 

            $total_amount = $total_amount + $productTotal;

        }

        $total_amount = currency($total_amount,$this->default_currency,$this->currency);

        return response()->json(['success' => true,'product_count' => $product_count,'total_amount' => $total_amount],200); 
    }

      
}