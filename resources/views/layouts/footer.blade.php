<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<p>
					{{ trans('homepage.organik_store_msg') }}
				</p>
				<div class="footer-social">
					<a href="{{ config('social.facebook') }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="{{ config('social.twitter') }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-2x"></i></a>
					<a href="{{ config('social.youtube') }}" data-toggle="tooltip" target="_blank" data-placement="top" title="Youtube"><i class="fa fa-youtube fa-2x"></i></a>
					<a href="{{ config('social.insta') }}" data-toggle="tooltip" target="_blank" data-placement="top" title="Instagram"><i class="fa fa-instagram fa-2x"></i></a>
					<a href="{{ config('social.google') }}" data-toggle="tooltip" target="_blank" data-placement="top" title="Google+"><i class="fa fa-google-plus fa-2x"></i></a>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					
					<h3 class="widget-title">{{ trans('footer.info') }}</h3>
					<ul>
						<li><a href="#">{{ trans('footer.new_product') }}</a></li>
						<li><a href="#">{{ trans('footer.top_seller') }}</a></li>
						<li><a href="http://blog.jangolo.cm">{{ trans('footer.our_blog') }}</a></li>
						<li><a href="{{ route('term.condition') }}">{{ trans('footer.term_condition') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">{{ trans('footer.useful_link') }}</h3>
					<ul>
						<li><a href="{{ route('faq') }}">{{ trans('footer.faq') }}</a></li>
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
					<?= Form::open(array('url' => route('subscribe'),'class' => 'newsletter')) ?>

						<input type="email" name="EMAIL" placeholder="Your email address" required="" />
						<button type="submit"><i class="fa fa-paper-plane"></i></button>

						<?= Form::close() ?>
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
