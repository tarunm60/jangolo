<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Product;
use App\ProductView;
use App\Productcategory;
use App\Contacts;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Productmeasure;
use Config,response;

class FarmController extends Controller 
{

    public function __construct()
    {
       $this->currency = \Session::get('currency');
       $this->default_currency = config('currency.default');
    }

    public function index()
    {
        $products = Product::shop();
        
        $category = Productcategory::get();

        $banner = Banner::where('status', '=', '1')->where('project', '=', 'shop')->get();

        $title = "Articles récents";
        // $list = view('farm.listhome', compact('products','title'));

        return view('farm.index', compact('list', 'banner','products','category'));
    }

    public function getProduct(){

        $product = Product::paginate(15);

        $max_price = Product::max('sale_price');
        
        $curr = \Session::get('currency');
        
        $default_curr = config('currency.default');
        
        if($curr == 'USD')
        {
            $max_price = str_replace('$','',currency($max_price,$default_curr,$curr));
        }
        elseif($curr == 'EUR') {
            $max_price = str_replace('€','',currency($max_price,$default_curr,$curr));
        }
        else
        {
            $max_price = $max_price;
        }

            
        $product_category = Productcategory::with('productCounts')->get()->toArray();
        $product_categories = '';       
        
        foreach ($product_category as $key => $value) {
            if($value['product_counts'] != null){
             $count = '';   
            foreach ($value['product_counts'] as $key => $product_count) {
                $count = $product_count['count'];
            }
            $value['product_counts'] = $count;
            }else{
            $value['product_counts'] = "0";

            }
            $product_categories[] = $value;
        }   
        
        return view('farm.product', compact('product','product_categories','max_price'));
    }
    
    public function categoryFilter(Request $request)
    {
        $data = $request->all();
        
        if(array_key_exists('category', $data) || array_key_exists('id', $data))
        {
            if(array_key_exists('category', $data)){
            
                $category = $data['category'];
                $product = Product::whereIn('category_id',$category)->get();
            }
            else
            {
                $category = $data['id'];
                $product = Product::where('category_id',$category)->get();
                
            }

        }
        else
        {
            $product = Product::paginate(20);
        }
            
            $view = \View::make('farm.price_filter_product',compact('product'));

            $contents = $view->render();
            
            echo json_encode(array('content'=>$contents));

            exit;

    }


    public function getContact()
    {
        return view('farm.contact');
    }

    public function postContact(ContactRequest $request)
    {
        $data = [
            'nom' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'telephone' => $request->get('telephone'),
        ];

        Contacts::create($data);

        return redirect()->back()->with('message','Message submitted successfully.');

    }

    public function productDetail(Request $request,$id)
    {
        $product_detail = Product::with('category','getView')->find($id);
        
        $product_category = Productcategory::pluck('title','id');
        
        $related_products = Product::where('category_id',$product_detail['category_id'])->whereNotIn('id',[$id])->get();
        
        return view('farm.product_detail',compact('product_detail','product_category','related_products'));
    }

    public function ajaxLoadProduct(Request $request)
    {
        $output = '';
        
        $id = $request->id;
        
        $products = Product::where('id','>',$id)->where('status', '=', 'PUBLISHED')->orderBy('id','asc')->limit(8)->get();
        
        if(!$products->isEmpty())
        {
            foreach($products as $single_product)
            {
                $url = route('product.detail',$single_product['id']);
                $path = IMAGE_PATH.'shop'.'/'.$single_product['picture'];
                $title = $single_product['title'];
                $price = currency($single_product['sale_price'],$this->default_currency,$this->currency);
                $id = $single_product['id'];

                $output .= '<div class="col-md-3 col-sm-6 col-xs-6 product-item masonry-item text-center juice">
                            <div class="product-thumb">
                                <a href="'.$url.'">
                                    <img src="'.$path.'" alt="" />
                                </a>
                                <div class="product-action">
                                    <span class="add-to-cart">
                                        <a onclick="addCart('.$id.')" data-toggle="tooltip" data-placement="top" title="Add to cart"></a>
                                    </span>
                                    <span class="wishlist">
                                        <a onclick="addWishlist( '.$id.' )" data-toggle="tooltip" data-placement="top" title="Add to wishlist"></a>
                                    </span>
                                    <span class="quickview hidden-xs">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Quickview"></a>
                                    </span>
                                    <span class="compare hidden-xs">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"></a>
                                    </span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="'.$url.'">
                                    <h2 class="title">'.$title.'</h2>
                                    <span class="price">
                                        <ins>'.$price.'</ins>
                                    </span>
                                </a>
                            </div>
                        </div>';
            }
            
            $output .= ' <div class="loadmore-contain">
                            <button id="load_more" class="organik-btn small" data-id="'.$id.'" > Load more </button>
                        </div>';
            
            return $output;
        }
    }
}

