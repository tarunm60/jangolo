@extends('layouts.layout')
@section('title',trans('checkout.thanks'))
@section('content')
<div class="noo-spinner">
	<div class="spinner">
		<div class="cube1"></div>
		<div class="cube2"></div>
	</div>
</div>
<!-- <div id="menu-slideout" class="slideout-menu hidden-md-up">
	<div class="mobile-menu">
		<ul id="mobile-menu" class="menu">
			<li class="dropdown">
				<a href="#">Home</a>
				<i class="sub-menu-toggle fa fa-angle-down"></i>
				<ul class="sub-menu">
					<li><a href="index.html">Organik Main</a></li>
					<li><a href="index-fresh.html">Organik Fresh</a></li>
					<li><a href="index-shop.html">Organik Shop</a></li>
					<li><a href="index-store.html">Organik Store</a></li>
					<li><a href="index-farm.html">Organik Farm</a></li>
					<li><a href="index-house.html">Organik House</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#">Pages</a>
				<i class="sub-menu-toggle fa fa-angle-down"></i>
				<ul class="sub-menu">
					<li class="dropdown">
						<a href="#">About Us</a>
						<i class="sub-menu-toggle fa fa-angle-down"></i>
						<ul class="sub-menu">
							<li><a href="about-us.html">About us 01</a></li>
							<li><a href="about-us-2.html">About us 02</a></li>
						</ul>
					</li>
					<li><a href="gallery-freestyle.html">Gallery Freestyle</a></li>
					<li><a href="gallery-grid.html">Gallery Grid</a></li>
					<li><a href="404.html">404</a></li>
				</ul>
			</li>
			<li class="active">
				<a href="shortcodes.html">Shortcodes</a>
			</li>
			<li class="dropdown">
				<a href="#">Shop</a>
				<i class="sub-menu-toggle fa fa-angle-down"></i>
				<ul class="sub-menu">
					<li><a href="my-account.html">My Account</a></li>
					<li><a href="cart-empty.html">Empty Cart</a></li>
					<li><a href="cart.html">Cart</a></li>
					<li><a href="checkout.html">Check Out</a></li>
					<li><a href="wishlist.html">Wishlist</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li><a href="shop-list.html">Shop List</a></li>
					<li><a href="shop-detail.html">Single Product</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#">Blog</a>
				<i class="sub-menu-toggle fa fa-angle-down"></i>
				<ul class="sub-menu">
					<li><a href="blog.html">Blog List</a></li>
					<li><a href="blog-classic.html">Blog Classic</a></li>
					<li><a href="blog-masonry.html">Blog Masonry</a></li>
					<li><a href="blog-detail.html">Blog Single</a></li>
				</ul>
			</li>
			<li>
				<a href="contact-us.html">Contact</a>
			</li>
		</ul>
	</div>
</div> -->
<div class="section bg-light pt-6 pb-6">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mb-1 section-pretitle">Wellcome to {{ LOGONAME }}!</div>
				<h2 class="text-center section-title mtn-2"> Thanks for subscribe with us!</h2>
				<div class="organik-seperator center">
					<span class="sep-holder"><span class="sep-line"></span></span>
					<div class="sep-icon"><i class="organik-flower"></i></div>
					<span class="sep-holder"><span class="sep-line"></span></span>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection