<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class CurrencyController extends Controller
{
    /**
     * Set currency cookie.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function set(Request $request,$curr)
    {
        
        $session_curr = \Session::get('currency');
        
        if(empty($session_curr))
        {
            \Session::put('currency',config('currency.default'));
        }
        else
        {
            \Session::put('currency',$curr);
        }
        
        return redirect()->back();
    }
}