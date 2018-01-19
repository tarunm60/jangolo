@extends('layout_new.layout')
@section('content')
<div class="section section-bg-10 pt-11 pb-17">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="page-title text-center">{{ trans('my_account.my_account') }}</h2>
			</div>
		</div>
	</div>
</div>
<div class="section border-bottom pt-2 pb-2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumbs">
					<li><a href="index.html">{{ trans('my_account.home') }}</a></li>
					<li><a href="shortcodes.html">{{ trans('my_account.shop') }}</a></li>
					<li>{{ trans('my_account.my_account') }}</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section pt-7 pb-7">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="commerce">
					<h2>{{ trans('my_account.login') }}</h2>
					<form class="commerce-login-form">
						<div class="row">
							<div class="col-md-12">
								<label>{{ trans('my_account.email') }} <span class="required">*</span></label>
								<div class="form-wrap">
									<input type="text" name="your-name" value="" size="40">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>{{ trans('my_account.password') }} <span class="required">*</span></label>
								<div class="form-wrap">
									<input type="password" name="your-pass" value="" size="40">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-wrap">
									<input type="submit" value="LOGIN">
									<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
									<span>{{ trans('my_account.remember_me') }}</span> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<a href="#">{{ trans('my_account.forgot_password') }}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection