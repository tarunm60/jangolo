@extends('layout_new.layout')
@section('content')
<div class="section section-bg-10 pt-11 pb-17">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="page-title text-center">Blog List</h2>
			</div>
		</div>
	</div>
</div>
<div class="section border-bottom pt-2 pb-2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumbs">
					<li><a href="index.html">Home</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li>Blog List</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section pt-7 pb-7">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="blog-list">
					<div class="blog-list-item">
						<div class="col-md-6">
							<div class="post-thumbnail">
								<a href="blog-detail.html"> 
									<img src="images/blog/blog_1.jpg" alt="" /> 
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="post-content">
								<div class="entry-meta">
									<span class="posted-on">
										<i class="ion-calendar"></i> 
										<span>August 9, 2016</span>
									</span>
									<span class="comment">
										<i class="ion-chatbubble-working"></i> 0
									</span>
								</div>
								<a href="blog-detail.html">
									<h1 class="entry-title">How to steam &amp; purée your sugar pie pumkin</h1>
								</a>
								<div class="entry-content"> 
									Cut the halves into smaller pieces and place in a large pot of water with a steam basket to keep the pumpkin pieces from touching…
								</div>
								<div class="entry-more">
									<a href="blog-detail.html">Read more</a>
								</div>
							</div>
						</div>
					</div>
					<div class="blog-list-item">
						<div class="col-md-6">
							<div class="post-thumbnail">
								<a href="blog-detail.html"> 
									<img src="images/blog/blog_2.jpg" alt="" /> 
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="post-content">
								<div class="entry-meta">
									<span class="posted-on">
										<i class="ion-calendar"></i> 
										<span>August 9, 2016</span>
									</span>
									<span class="comment">
										<i class="ion-chatbubble-working"></i> 0
									</span>
								</div>
								<a href="blog-detail.html">
									<h1 class="entry-title">Great bulk recipes to help use all your organic vegetables</h1>
								</a>
								<div class="entry-content"> 
									A fridge full of organic vegetables purchased or harvested with the best of intentions, and then life gets busy, leaving no time to peel,
								</div>
								<div class="entry-more">
									<a href="blog-detail.html">Read more</a>
								</div>
							</div>
						</div>
					</div>
					<div class="blog-list-item">
						<div class="col-md-6">
							<div class="post-thumbnail">
								<a href="blog-detail.html"> 
									<img src="images/blog/blog_1.jpg" alt="" /> 
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="post-content">
								<div class="entry-meta">
									<span class="posted-on">
										<i class="ion-calendar"></i> 
										<span>August 9, 2016</span>
									</span>
									<span class="comment">
										<i class="ion-chatbubble-working"></i> 0
									</span>
								</div>
								<a href="blog-detail.html">
									<h1 class="entry-title">How can salmon be raised organically in fish farms?</h1>
								</a>
								<div class="entry-content"> 
									Organic food consumption is rapidly increasing. The heightened interest in the global environment and a willingness to look
								</div>
								<div class="entry-more">
									<a href="blog-detail.html">Read more</a>
								</div>
							</div>
						</div>
					</div>
					<div class="blog-list-item">
						<div class="col-md-6">
							<div class="post-thumbnail">
								<a href="blog-detail.html"> 
									<img src="images/blog/blog_2.jpg" alt="" /> 
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="post-content">
								<div class="entry-meta">
									<span class="posted-on">
										<i class="ion-calendar"></i> 
										<span>August 9, 2016</span>
									</span>
									<span class="comment">
										<i class="ion-chatbubble-working"></i> 0
									</span>
								</div>
								<a href="blog-detail.html">
									<h1 class="entry-title">Change your eating habits with this organic food diet plan</h1>
								</a>
								<div class="entry-content"> 
									The Age of Information has given us modern conveniences like the Internet and smart devices. With these, information is readily available
								</div>
								<div class="entry-more">
									<a href="blog-detail.html">Read more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="pagination"> 
					<a class="prev page-numbers" href="#">Prev</a>
					<a class="page-numbers" href="#">1</a>
					<span class="page-numbers current">2</span> 
					<a class="page-numbers" href="#">3</a> 
					<a class="next page-numbers" href="#">Next</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="sidebar">
					<div class="widget widget-product-search">
						<form class="form-search">
							<input type="text" class="search-field" placeholder="Search products…" value="" name="s" />
							<input type="submit" value="Search" />
						</form>
					</div>
					<div class="widget widget-product-categories">
						<h3 class="widget-title">Categories</h3>
						<ul class="product-categories">
							<li><a href="#">Cooking Tips</a> <span class="count">2</span></li>
							<li><a href="#">Nutrition Meal</a> <span class="count">5</span></li>
							<li><a href="#">Organic Planting</a> <span class="count">4</span></li>
							<li><a href="#">Recipes</a> <span class="count">4</span></li>
						</ul>
					</div>
					<div class="widget widget_posts_widget">
						<h3 class="widget-title">Popular Posts</h3>
						<div class="item">
							<div class="thumb"> 
								<img src="images/blog/thumb/blog_1.jpg" alt="" />
							</div>
							<div class="info">
								<span class="title">
									<a href="blog-detail.html"> How to steam &amp; purée your sugar pie pumkin </a> 
								</span> 
								<span class="date"> August 9, 2016 </span>
							</div>
						</div>
						<div class="item">
							<div class="thumb"> 
								<img src="images/blog/thumb/blog_2.jpg" alt="" />
							</div>
							<div class="info">
								<span class="title">
									<a href="blog-detail.html"> How to steam &amp; purée your sugar pie pumkin </a> 
								</span> 
								<span class="date"> August 9, 2016 </span>
							</div>
						</div>
						<div class="item">
							<div class="thumb"> 
								<img src="images/blog/thumb/blog_1.jpg" alt="" />
							</div>
							<div class="info">
								<span class="title">
									<a href="blog-detail.html"> How can salmon be raised organically in fish farms? </a> 
								</span> 
								<span class="date"> August 9, 2016 </span>
							</div>
						</div>
					</div>
					<div class="widget widget-tags">
						<h3 class="widget-title">Search by Tags</h3>
						<div class="tagcloud">
							<a href="#">bread</a> <a href="#">food</a> <a href="#">fruits</a> <a href="#">green</a> <a href="#">healthy</a> <a href="#">natural</a> <a href="#">organic store</a> <a href="#">vegatable</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection