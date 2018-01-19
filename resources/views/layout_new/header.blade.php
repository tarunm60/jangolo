<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="topbar-text">
					<span>{{ trans('header.work_time') }}</span> 
					<span><i class="fa fa-whatsapp"></i> <b>{{ trans('header.whats_up') }}</b></span> 
				</div>
			</div>
			<div class="col-md-6">
				<div class="topbar-menu">
					<ul class="topbar-menu">
						<li class="dropdown">
							<a href="#"> {{ Config::get('languages')[App::getLocale()] }}</a>
							<ul class="sub-menu" id="lang">
								@foreach (Config::get('languages') as $lang => $language)
									@if ($lang != App::getLocale())
										<li>
										<a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
										</li>
									@endif
								@endforeach
							</ul>
						</li>
						<li><a href="{{ route('user.login') }}">{{ trans('header.login') }}</a></li>
						<li><a href="#">{{ trans('header.register') }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<header id="header" class="header header-desktop header-2">
	<div class="top-search">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form>
						<input type="search" class="top-search-input" name="s" placeholder="What are you looking for?" />
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="./" id="logo">
					<img class="logo-image" src="{{ IMAGE_PATH.'/jangolo-logo.png' }}" alt="Jangolo Logo" />
				</a>
			</div>
			<div class="col-md-9">
				<div class="header-right">
					<nav class="menu">
						<ul class="main-menu">
							<li class="active dropdown">
								<a href="{{ route('home') }}">{{ trans('header.home') }}</a>
								<ul class="sub-menu">
									<li><a href="./">{{ trans('header.organik') }} {{ trans('header.main') }}</a></li>
									<li><a href="index-fresh.html">{{ trans('header.organik') }} {{ trans('header.fresh') }}</a></li>
									<li><a href="index-shop.html">{{ trans('header.organik') }} {{ trans('header.shop') }}</a></li>
									<li><a href="index-store.html">{{ trans('header.organik') }} {{ trans('header.store') }}</a></li>
									<li><a href="index-farm.html">{{ trans('header.organik') }} {{ trans('header.farm') }}</a></li>
									<li><a href="index-house.html">{{ trans('header.organik') }} {{ trans('header.house') }}</a></li>
								</ul>
							</li>
							<!-- <li class="dropdown">
								<a href="#">{{ trans('header.pages') }}</a>
								<ul class="sub-menu">
									<li class="menu-item-has-children">
										<a href="#">{{ trans('header.about_us') }}</a>
										<ul class="sub-menu">
											<li><a href="about-us.html">About us 01</a></li>
											<li><a href="about-us-2.html">About us 02</a></li>
										</ul>
									</li>
									<li><a href="gallery-freestyle.html">{{ trans('header.gallery') }}</a></li>
									<li><a href="gallery-grid.html">Gallery Grid</a></li>
									<li><a href="404.html">404</a></li>
								</ul>
							</li>
							<li>
								<a href="shortcodes.html">{{ trans('header.shortcode') }}</a>
							</li> -->
							<li class="dropdown mega-menu">
								<a href="#">{{ trans('header.shop') }}</a>
								<ul class="sub-menu">
									<li>
										<div class="mega-menu-content">
											<div class="row">
												<div class="col-sm-3">
													<div class="pt-4 pb-4">
														<h3>{{ trans('header.shop') }} {{ trans('header.pages') }}</h3>
														<ul>
															<li><a href="my-account.html">My Account</a></li>
															<li><a href="cart-empty.html">Empty Cart</a></li>
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Check Out</a></li>
															<li><a href="wishlist.html">Wishlist</a></li>
															<li><a href="shop.html">Shop</a></li>
															<li><a href="shop-list.html">Shop List</a></li>
															<li><a href="shop-detail.html">Single Product</a></li>
														</ul>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="pt-4 pb-4">
														<h3>{{ trans('header.fruits') }}</h3>
														<ul>
															<li><a href="#">Seville Orange</a></li>
															<li><a href="#">Aurore Grape</a></li>
															<li><a href="#">Tieton Cherry</a></li>
															<li class="new"><a href="#">Tomato Juice</a></li>
															<li><a href="#">Cauliflower</a></li>
														</ul>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="pt-4 pb-4">
														<h3>{{ trans('header.featured') }}</h3>
														<ul>
															<li><a href="#">Sprouting Broccoli</a></li>
															<li class="sale"><a href="#">Chinese Cabbage</a></li>
															<li><a href="#">Cara Orange</a></li>
															<li><a href="#">Cauliflower</a></li>
															<li><a href="#">Tomato Juice</a></li>
														</ul>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="pt-4 pb-4">
														<h3>{{ trans('header.best_seller') }}</h3>
														<ul>
															<li><a href="#">Uvina Grape</a></li>
															<li><a href="#">Seville Orange</a></li>
															<li><a href="#">Aurore Grape</a></li>
															<li><a href="#">Tieton Cherry</a></li>
															<li class="new"><a href="#">Tomato Juice</a></li>
															<li><a href="#">Sprouting Broccoli</a></li>
														</ul>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="pt-4 pb-4">
														<img src="{{ asset('images/megamenu_ads.jpg') }}" alt="" />
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<a href="http://blog.jangolo.cm" target="_blank">{{ trans('header.blog') }}</a>
								<!-- <ul class="sub-menu">
									<li><a href="blog.html">Blog List</a></li>
									<li><a href="blog-classic.html">Blog Classic</a></li>
									<li><a href="blog-masonry.html">Blog Masonry</a></li>
									<li><a href="blog-detail.html">Blog Single</a></li>
								</ul> -->
							</li>
							<li>
								<a href="{{ route('farm.contact') }}">{{ trans('header.contact') }}</a>
							</li>
						</ul>
					</nav>
					<div class="btn-wrap">
						<div class="mini-cart-wrap">
							<div class="mini-cart">
								<div class="mini-cart-icon" data-count="2">
									<i class="ion-bag"></i>
								</div>
							</div>
							<div class="widget-shopping-cart-content">
								<ul class="cart-list">
									<li>
										<a href="#" class="remove">×</a>
										<a href="shop-detail.html">
											<img src="{{ asset('images/shop/thumb/shop_1.jpg') }}" alt="" />
											Orange Juice&nbsp;
										</a>
										<span class="quantity">1 × $12.00</span>
									</li>
									<li>
										<a href="#" class="remove">×</a>
										<a href="shop-detail.html">
											<img src="{{ asset('images/shop/thumb/shop_2.jpg') }}" alt="" />
											Aurore Grape&nbsp;
										</a>
										<span class="quantity">1 × $9.00</span>
									</li>
								</ul>
								<p class="total">
									<strong>Subtotal:</strong> 
									<span class="amount">$21.00</span>
								</p>
								<p class="buttons">
									<a href="cart.html" class="view-cart">View cart</a>
									<a href="checkout.html" class="checkout">Checkout</a>
								</p>
							</div>
						</div>
						<div class="top-search-btn-wrap">
							<div class="top-search-btn">
								<a href="javascript:void(0);">
									<i class="ion-search"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<header class="header header-mobile">
	<div class="container">
		<div class="row">
			<div class="col-xs-2">
				<div class="header-left">
					<div id="open-left"><i class="ion-navicon"></i></div>
				</div>
			</div>
			<div class="col-xs-8">
				<div class="header-center">
					<a href="./" id="logo-2">
						<img class="logo-image" src="{{ asset('images/logo.png') }}" alt="Organik Logo" />
					</a>
				</div>
			</div>
			<div class="col-xs-2">
				<div class="header-right">
					<div class="mini-cart-wrap">
						<a href="cart.html">
							<div class="mini-cart">
								<div class="mini-cart-icon" data-count="2">
									<i class="ion-bag"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
