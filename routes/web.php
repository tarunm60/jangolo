<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;

Route::get('hash',function(){
	return Hash::make('123456');
});

Route::get('/',['as'=>'home','uses'=>'FarmController@index']);
Route::get('/product/{product}',['as'=>'product.show','uses'=>'FarmController@product']);

Route::get('/products/search',['as'=>'products.search','uses'=>'ProductsController@search']);
Route::get('/product/category/{category}',['as'=>'product.category.index','uses'=>'FarmController@category']);

Route::group(array('middleware'=>['lang','product_count']),function(){

	// Route::get('/users/login',['as'=>'users.login','uses'=>'UsersController@login']);
	// Route::post('/users/login',['as'=>'users.login','uses'=>'UsersController@connect']);
	// Route::post('/users/register',['as'=>'users.register','uses'=>'UsersController@login']);
	// Route::get('/users/logout',['as'=>'users.logout','uses'=>'LoginController@logout']);
	// Route::get('/farm/showbasket',['as'=>'farm.showbasket','uses'=>'FarmController@showbasket']);

	Route::get('login',['as' => 'user.login','uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('login',['as'=>'users.post.login','uses'=>'Auth\LoginController@login']);
	Route::get('logout',['as'=>'user.logout','uses'=>'Auth\LoginController@logout']);

	Route::get('register',['as' => 'user.register','uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('register',['as' => 'user.post.register','uses' => 'Auth\RegisterController@register']);

	Route::get('profile',['as' => 'user.profile','uses' => 'UsersController@getProfile']);

	// Route::get('/cart/showbasket',['as'=>'cart.showbasket','uses'=>'CartController@showbasket']);
	// Route::get('/cart/add/{id}/{qte}',['as'=>'cart.add','uses'=>'CartController@add']);
	// Route::get('/cart/remove/{id}/{qte}',['as'=>'cart.remove','uses'=>'CartController@remove']);
	// Route::get('/cart/show',['as'=>'cart.show','uses'=>'CartController@show']);
	// Route::get('/cart/',['as'=>'cart','uses'=>'CartController@cart']);

	//--------------------------------
	//-------Cart-------------
	Route::get('cart',['as' => 'get.cart','uses' => 'CartController@getCart']);
	
	Route::get('cart/check-out',['as' => 'get.checkout','uses' => 'CheckoutController@getCheckout']);

	Route::post('order',['as' => 'place.order','uses' => 'CheckoutController@placeorder']);
	//-------Add to Cart------
	Route::post('add-to-cart',['as' => 'add.cart','uses' => 'CartController@addCart']);
	Route::post('update-cart',['as' => 'update.cart','uses' => 'CartController@updateCart']);
	Route::post('delete-cart',['as' => 'delete.cart','uses' => 'CartController@deleteCart']);

	//---------Wishlist-------
	Route::get('wishlist',['as' => 'get.wishlist','uses' => 'WishlistController@getWishlist']);
	Route::post('wishlist',['as' => 'add.wishlist','uses' => 'WishlistController@addWishlist']);
	Route::post('delete-wishlist',['as' => 'delete.wishlist','uses' => 'WishlistController@deleteWishlist']);

	Route::get('farm',['as' => 'farm','uses' => 'FarmController@getProduct']);
	Route::get('farm/view/{id}',['as' => 'product.detail','uses' => 'FarmController@productDetail']);
	
	Route::get('/contact-us',['as' => 'farm.contact','uses' => 'FarmController@getContact']);
	Route::post('/contact-us',['as' => 'contact.us','uses' => 'FarmController@postContact']);

	Route::get('term-condition',['as' => 'term.condition','uses' => 'AboutusController@termCondition']);
	Route::get('faq',['as' => 'faq','uses' => 'AboutusController@getFaq']);

	Route::get('blog',['as' => 'blog.get','uses' => 'BlogController@getBlog']);
	Route::get('blog/{id}',['as' => 'blog.detail','uses' => 'BlogController@blogDetail']);

	Route::get('about-us',['as' => 'about.us','uses' => 'AboutusController@about']);

	Route::post('your-opinion',['as' => 'submit.opinion','uses' => 'ProductsController@userOpinion']);

	//----------View Count-----------------
	Route::post('product-view',['as' => 'product.count','uses' => 'ProductsController@viewCount']);

	//------------Filter product------------	
	Route::post('filter-product',['as' => 'price.filter','uses' => 'ProductsController@priceFilter']);
	Route::post('category-filter',['as' => 'category.filter','uses' => 'FarmController@categoryFilter']);
	
	//---------Load More Product--------
	Route::post('load-product',['as' => 'load.product','uses' => 'FarmController@ajaxLoadProduct']);
	//--------------------------------
	
	//--------Thank you page======
	Route::get('thanks',['as' => 'thank.you','uses' => 'CheckoutController@thankYou']);

	//--------News Letters---------
	Route::post('subscribe',['as' => 'subscribe','uses' => 'NewslettersController@getSubscribe']);

	Route::get('/newsletters/register',['as'=>'newsletters.register','uses'=>'NewslettersController@register']);
	Route::get('/users/{user}', function (User $user) {
	    return view('users.profile.show',compact('user'));
	});
	


	Route::get('/users', function () {
	    $users = User::limit(10)->get();
	    return view('users.index', compact('users'));
	});

	Route::get('show', function () {
	    return view('cart.show',compact('list'));
	});

	// Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/home', function () {
	    
	    $value = session('key');
	    session(['key' => 'value']);
	});

	Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

	Route::get('currency/{curr}', ['as'=>'currency.switch', 'uses'=>'CurrencyController@set']);


});