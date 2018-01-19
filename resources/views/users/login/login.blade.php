@extends('layouts.layout')
@section('title',trans('my_account.my_account'))
@section('content')
<div class="section pt-7 pb-7">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="commerce">
					<h2>{{ trans('my_account.login') }}</h2>
            		<?= Form::open(array('url' => route('users.post.login'),'class' => 'cart')) ?>
						<div class="row">
							<div class="col-md-12">
								<label>{{ trans('my_account.email') }} <span class="required">*</span></label>
								<div class="form-wrap">
									<input type="text" name="email" value="" size="40">
								</div>
								@if($errors->has('email'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
		                            </span>
		                        @endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>{{ trans('my_account.password') }} <span class="required">*</span></label>
								<div class="form-wrap">
									<input type="password" name="password" value="" size="40">
								</div>
								@if($errors->has('password'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
		                            </span>
		                        @endif
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
					<?= Form::close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection