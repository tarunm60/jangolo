@extends('layouts.layout')
@section('title',trans('term_condition.term_conditions'))
@section('content')
<div class="section pt-7 pb-7">
	<div class="container">
		<div class="row">
			<h3>{{ trans('term_condition.term_conditions') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.object') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.obj_desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.price') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.price_desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.availability') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.availability_desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.payment_terms') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.payment_terms_desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.delivery_and_transport') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.delivery_and_transport_desc') }}</p>
			</div>
			<p>{{ trans('term_condition.note') }}</p>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.return_and_exchange') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.return_and_exchange_desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.legal_warranty') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.legal_warranty_desc') }}</p>
			</div>
		</div>
		<div class="row">
			<h3>{{ trans('term_condition.computing_and_freedom') }}</h3>
			<div class="row">
				<p>{{ trans('term_condition.computing_and_freedom_desc') }}</p>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
<style type="text/css">
	p{
		padding-left: 20px;
	}
</style>
@endsection