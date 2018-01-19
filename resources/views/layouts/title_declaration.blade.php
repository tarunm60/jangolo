<div class="section section-bg-9 pt-11 pb-17">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="page-title text-center">@yield('title')</h2>
			</div>
		</div>
	</div>
</div>
<div class="section border-bottom pt-2 pb-2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumbs">
					<li><a href="{{ route('home') }}">{{ trans('about_us.home') }}</a></li>
					<li>@yield('title')</li>
				</ul>
			</div>
		</div>
	</div>
</div>