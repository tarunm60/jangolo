@extends('layouts.layout')
@section('title',trans('faq.faq'))
@section('content')
<div class="section pt-7 pb-7">
	<div class="container">
		<div class="row">
			<h3>{{ trans('faq.what_payment_method_que') }}</h3>
			<div class="row">
				<p>{{ trans('faq.what_payment_method_ans') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('faq.shipping_cost_que') }}</h3>
			<div class="row">
				<p>{{ trans('faq.shipping_cost_ans') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('faq.delivery_city_que') }}</h3>
			<div class="row">
				<p>{{ trans('faq.delivery_city_ans') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('faq.paypal_not_english_que') }}</h3>
			<div class="row">
				<p>{{ trans('faq.paypal_not_english_ans') }}</p>
			</div>
		</div>
	</div>
</div>
@endsection