@extends('layouts.layout')
@section('title',trans('my_account.my_account'))
@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                    <h2>{{ trans('my_account.register') }}</h2>
                    <?= Form::open(array('url' => route('user.post.register'),'class' => 'commerce-login-form')) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ trans('checkout.first_name') }} <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" old="{{ old('firstname') }}" name="firstname" value="" size="40" />
                                </div>
                                @if($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>{{ trans('checkout.last_name') }} <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" old="{{ old('lastname') }}" name="lastname" value="" size="40" />
                                </div>
                                @if($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{ trans('my_account.email') }} <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" old="{{ old('email') }}" name="email" value="" size="40">
                                </div>
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="col-md-6">
                                <label>{{ trans('my_account.phone') }}</label>
                                <div class="form-wrap">
                                    <input type="text" old="{{ old('email') }}" name="phone" value="" size="40">
                                </div>
                                @if($errors->has('phone'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
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
                        
                            <div class="col-md-6">
                                <label>{{ trans('my_account.confirm_password') }} <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="password" name="password_confirmation" value="" size="40">
                                </div>
                                @if($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input type="submit" value="{{ trans('my_account.register') }}">
                                    <input name="condition" type="checkbox" id="condition" value="forever" />
                                    <span>{{ trans('my_account.condition') }}</span> 
                                </div>
                            </div>
                        </div>
                    <?= Form::close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection