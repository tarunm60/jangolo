<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductView;
use App\UserOpinion;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
    public function index($status = 'PUBLISHED')
    {
        $products = Product::where('status', '=', $status)
//            ->limit(18)
            ->get();

        //        $products = Product::all();
        return response()->json([
            'message'  => 'This is a test',
            'count'    => count($products),
            'products' => $products,
        ], 200);
    }

    public function homeproducts()
    {
        $products = Product::query()->limit(18)->get();

        return response()->json([
            'message'  => 'request sucessfull',
            'count'    => count($products),
            'products' => $products,
        ], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = $request->input('title');
        $title = $request->input('title');
        $title = $request->input('title');
        $title = $request->input('title');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'sale_price'  => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->suppliers = $product->users()->get();

        return response()->json([
            'message' => 'This is a test',
            'product' => $product,

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('s');
        $products = Product::title($search)->published()->description($search)->get();
        $title = "Résultat pour ".$search;
        $list = view('farm.listhome', compact('products','title'));

        return view('farm.index', compact('list'));
    }

    public function userOpinion(Request $request)
    {
        $data = $request->all();
        
        $rules = [
            'opinion' => 'required',
        ];
        $message = [
            'opinion.required'=> 'Please write something.',
        ];
        
        $this->validate($request,$rules,$message);


        if(\Auth::check())
        {
            $user = auth()->user();

            $data = [
                'user_id' => $user['id'],
                'description' => $data['opinion']
            ];    

            UserOpinion::create($data);

            return response()->json(['success' => true],200);
        }
        else
        {
            return response()->json(['success' => false],201);
        }
    }

    public function priceFilter(Request $request)
    {
        $min_price = $request->get('min_price');
        $max_price = $request->get('max_price');

        $curr = \Session::get('currency');
        
        $default_curr = config('currency.default');

        if($curr == 'USD')
        {
            $min_price = str_replace(' F.CFA','',currency($min_price,$curr,$default_curr));
            $max_price = str_replace(' F.CFA','',currency($max_price,$curr,$default_curr));
        }
        elseif($curr == 'EUR') {
            
            $min_price = str_replace(' F.CFA','',currency($min_price,$curr,$default_curr));
            $max_price = str_replace(' F.CFA','',currency($max_price,$curr,$default_curr));
        }
        else
        {
            $min_price = $min_price;
            $max_price = $max_price;
        }

        $product = '';
        
        $min_price = (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $min_price));
        $max_price = (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $max_price));

        $product = Product::where('sale_price','>',$min_price)->where('sale_price','<',$max_price)->get()->toArray();
        
        foreach ($product as $key => $value) {

            $value['sale_price'] = currency($min_price,$this->default_currency,$this->currency);
            
            $product[] = $value;

        }
        
        $view = \View::make('farm.price_filter_product',compact('product'));

        $contents = $view->render();
        
        echo json_encode(array('content'=>$contents));

        exit;
        
    }

  
    public function viewCount(Request $request)
    {
        $productId = $request->get('product_id');

        $product_count = ProductView::where('product_id',$productId)->first();

        if(count($product_count))
        {
            $count = $product_count['view_count'] + 1;

            ProductView::where('product_id',$productId)->update(['view_count' => $count]);
        }
        else
        {
            $count = 1;
            $data = [
                'product_id' => $productId,
                'view_count' => $count,
            ];

            ProductView::create($data);
        }
        return response()->json(['success' => true,'product_view' => $count],200);
    }
}
