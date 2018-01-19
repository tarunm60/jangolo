<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<img src="{{ asset('images/footer_logo.png') }}" class="footer-logo" alt="" />
				<p>
					{{ trans('footer.welcome_desc') }}
				</p>
				<div class="footer-social">
					<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
					<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
					<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
					<a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					
					<h3 class="widget-title">{{ trans('footer.info') }}</h3>
					<ul>
						<li><a href="#">{{ trans('footer.new_product') }}</a></li>
						<li><a href="#">{{ trans('footer.top_seller') }}</a></li>
						<li><a href="http://blog.jangolo.cm">{{ trans('footer.our_blog') }}</a></li>
						<li><a href="#">{{ trans('footer.about_our_shop') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">{{ trans('footer.useful_link') }}</h3>
					<ul>
						<li><a href="#">{{ trans('footer.our_team') }}</a></li>
						<li><a href="http://blog.jangolo.cm">{{ trans('footer.our_blog') }}</a></li>
						<li><a href="{{ route('about.us') }}">{{ trans('footer.about_us') }}</a></li>
						<li><a href="#">{{ trans('footer.secure_shopping') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="widget">
					<h3 class="widget-title">{{ trans('footer.subscribe') }}</h3>
					<p>
						{{ trans('footer.subscribe_mail') }}
					</p>
					<form class="newsletter">
						<input type="email" name="EMAIL" placeholder="Your email address" required="" />
						<button><i class="fa fa-paper-plane"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				Copyright © 2017 <a href="#">{{ LOGONAME }}</a> - All Rights Reserved.
			</div>
			<div class="col-md-4">
				<img src="{{ asset('images/footer_payment.png') }}" alt="" />
			</div>
		</div>
	</div>
	<div class="backtotop" id="backtotop"></div>
</div>