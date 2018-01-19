<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Wishlist;
use App\Product;
use Auth;

class WishlistController extends Controller
{
    
    public function getWishlist(Request $request)
    {
        $user = auth()->user();
        
        $wishlist = Wishlist::where('user_id',$user['id'])->get();

        $new = '';

        foreach ($wishlist as $key => $value) {

            $product_detail = Product::find($value['product_id']);
            $new[] = $product_detail;
        }
        
        $wishlist = $new;
        
        return view('farm.wishlist',compact('wishlist'));
    }
    public function addWishlist(Request $request)
    {
        $productId = $request->get('product_id');
        
        if(\Auth::check())
        {
            $user = auth()->user();
            
            $data = [
                'user_id' => $user['id'],
                'product_id' => $productId
            ];
            
            Wishlist::create($data);

            return response()->json(['success' => true],200);
        }
        else
        {
           return response()->json(['success' => false],201);
        }

    }

    public function deleteWishlist(Request $request)
    {
        $user = auth()->user();

        $productId = $request->get('product_id');
        
        Wishlist::where('user_id',$user['id'])
                    ->where('product_id',$productId)
                    ->delete();
        
        return response()->json(['success' => true],200);

    }

}