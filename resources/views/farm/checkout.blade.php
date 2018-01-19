@extends('layouts.layout')
@section('title',trans('checkout.checkout'))
@section('content')
<div class="section section-checkout pt-7 pb-7">
	<div class="container">
		<div class="row">
			<?php $user = \Auth::user(); ?>
			<?= Form::model($user,array('url' => route('place.order'),'class' => 'cart')) ?>
			<div class="col-md-6">
				<h3>{{ trans('checkout.billing_details') }}</h3>
					<div class="row">
						<div class="col-md-6">
							<label>{{ trans('checkout.first_name') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('firstname',old('firstname'),['class'=>'form-control', 'placeholder'=>'Enter First Name']) ?> 
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
								<?= Form::text('lastname',old('lastname'),['class'=>'form-control', 'placeholder'=>'Enter Last Name']) ?>
							</div>
							@if($errors->has('lastname'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('lastname') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.company_name') }}</label>
							<div class="form-wrap">
								<?= Form::text('shopname',old('shopname'),['class'=>'form-control', 'placeholder'=>'Enter Company Name']) ?>
							</div>
							@if($errors->has('shopname'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('shopname') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.country') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::select('country',$country,['id'=>'country','class'=>'form-control']) ?>
							</div>
							@if($errors->has('country'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('country') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.town') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('city',old('city'),['class'=>'form-control', 'placeholder'=>'Enter City']) ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.address') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('address',old('address'),['class'=>'form-control', 'placeholder'=>'Enter Address']) ?>
							</div>
							@if($errors->has('address'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>{{ trans('checkout.phone') }}</label>
							<div class="form-wrap">
								<?= Form::text('telephone',old('telephone'),['class'=>'form-control', 'placeholder'=>'Enter Phone Name']) ?>
							</div>
							@if($errors->has('telephone'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('telephone') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="col-md-6">
							<label>{{ trans('checkout.email') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('email',old('email'),['class'=>'form-control', 'placeholder'=>'Enter Email']) ?>
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
							<div class="form-wrap">
								<input name="createaccount" type="checkbox" id="createaccount" value="1" />
								<span>{{ trans('checkout.create_account') }}</span> 
							</div>
						</div>
					</div>
			</div>
			<div class="col-md-6">
				<h3>{{ trans('checkout.shipping_details') }}</h3>
					<div class="row">
						<div class="col-md-6">
							<label>{{ trans('checkout.first_name') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('shipping_firstname',old('firstname'),['class'=>'form-control', 'placeholder'=>'Enter First Name']) ?> 
							</div>
							@if($errors->has('shipping_firstname'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('shipping_firstname') }}</strong>
	                            </span>
	                        @endif
						</div>
						<div class="col-md-6">
							<label>{{ trans('checkout.last_name') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('shipping_lastname',old('lastname'),['class'=>'form-control', 'placeholder'=>'Enter Last Name']) ?>
							</div>
							@if($errors->has('shipping_lastname'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('shipping_lastname') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.company_name') }}</label>
							<div class="form-wrap">
								<?= Form::text('shipping_shopname',old('shopname'),['class'=>'form-control', 'placeholder'=>'Enter Company Name']) ?>
							</div>
							@if($errors->has('shipping_shopname'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('shipping_shopname') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.country') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::select('shipping_country',$country,['id'=>'country','class'=>'form-control']) ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.town') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('shipping_city',old('city'),['class'=>'form-control', 'placeholder'=>'Enter City']) ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.address') }} <span class="required">*</span></label>
							<div class="form-wrap">
								<?= Form::text('shipping_address',old('address'),['class'=>'form-control', 'placeholder'=>'Enter Address']) ?>
							</div>
							@if($errors->has('shipping_address'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{ $errors->first('shipping_address') }}</strong>
	                            </span>
	                        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>{{ trans('checkout.order_note') }}</label>
							<div class="form-wrap">
								<textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
							</div>
						</div>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3 class="mt-3">{{ trans('checkout.your_order') }}</h3>
				<div class="order-review">
							
					<table class="checkout-review-order-table">
						<thead>
							<tr>
								<th class="product-name">{{ trans('checkout.product') }}</th>
								<th class="product-name">Price</th>
								<th class="product-total">{{ trans('checkout.total') }}</th>
							</tr>
						</thead>
						<tbody>
						@if(!empty($product_detail))
							@foreach($product_detail as $single_product)
								<tr>
									<td class="product-name">
										{{ $single_product['title'] }}&nbsp;<strong class="product-quantity">× {{ $single_product['quantity'] }}</strong>
									</td>
									<td class="product-name">{{ currency($single_product['sale_price'],$default_currency,$currency) }}
									</td>
									<td class="product-total">
										{{ currency($single_product['subTotal'],$default_currency,$currency) }}
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
						<tfoot>
							<tr>
								<th colspan="2">Subtotal</th>
								<td>{{ currency($total_amount,$default_currency,$currency) }}</td>
							</tr>
							<tr>
								<th>{{ trans('checkout.shipping') }}</th>
								<th></th>
								<td>
									<ul id="shipping_method">
										<li>
											<input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method" checked="checked">
											<span>{{ trans('checkout.free_shipping') }}</span>
										</li>
										<li>
											<input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_local_pickup2" value="local_pickup:2" class="shipping_method">
											<span>{{ trans('checkout.local_pickup') }}</span>
										</li>
									</ul>
								</td>
							</tr>
							<tr>
								<th colspan="2">Tax</th>
								<td>$2.10</td>
							</tr>
							<tr>
								<th colspan="2">Service</th>
								<td>$1.16</td>
							</tr>
							<tr class="order-total">
								<th colspan="2">Total</th>
								<td><strong>{{ currency($total_amount,$default_currency,$currency) }}</strong></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="checkout-payment">
					<ul class="payment-method">
						<li>
							<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">
							<span>{{ trans('checkout.cash_on_delivery') }}</span>
							<div class="payment-box">
								<p>{{ trans('checkout.pay_with') }}.</p>
							</div>
						</li>
						<li>
							<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal" data-order_button_text="Proceed to PayPal">
							{{ trans('checkout.paypal') }} <img src="{{ IMAGE_PATH.'payment.jpg' }}" alt="">
						</li>
					</ul>
					<div class="text-right text-center-sm">
						<button class="organik-btn mt-6" type="submit"> Place Order </button>
					</div>
				</div>
			</div>
		</div>
		<?= Form::close() ?>
	</div>
</div>
@endsection