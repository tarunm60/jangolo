@extends('layouts.layout')
@section('title',trans('contact.contact_us'))
@section('content')
<div class="section pt-10 pb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mb-1 section-pretitle">{{ trans('contact.get_touch') }}</div>
				<h2 class="text-center section-title mtn-2">{{ trans('contact.healthy_organic_farm') }}</h2>
				<div class="organik-seperator mb-6 center">
					<span class="sep-holder"><span class="sep-line"></span></span>
					<div class="sep-icon"><i class="organik-flower"></i></div>
					<span class="sep-holder"><span class="sep-line"></span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div id="googleMap" class="mb-6" data-icon="" data-lat="{{ config('contact.location_lat') }}" data-lon="{{ config('contact.location_long') }}"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="contact-info">
					<div class="contact-icon">
						<i class="fa fa-map-marker"></i>
					</div>
					<div class="contact-inner">
						<h6 class="contact-title"> {{ trans('contact.address') }}</h6>
						<div class="contact-content">
							{{ config('contact.location_city') }}
							<br />
							{{ config('contact.location_add') }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="contact-info">
					<div class="contact-icon">
						<i class="fa fa-phone"></i>
					</div>
					<div class="contact-inner">
						<h6 class="contact-title"> {{ trans('contact.hotline') }}</h6>
						<div class="contact-content">
							{{ config('contact.hotline') }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="contact-info">
					<div class="contact-icon">
						<i class="fa fa-envelope"></i>
					</div>
					<div class="contact-inner">
						<h6 class="contact-title"> {{ trans('contact.email_contact') }}</h6>
						<div class="contact-content">
							{{ config('contact.contact') }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="contact-info">
					<div class="contact-icon">
						<i class="fa fa-globe"></i>
					</div>
					<div class="contact-inner">
						<h6 class="contact-title"> {{ trans('contact.website') }}</h6>
						<div class="contact-content">
							{{ config('contact.website') }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<hr class="mt-4 mb-7" />
				<div class="text-center mb-1 section-pretitle">{{ trans('contact.leave_msg') }}</div>
				<div class="organik-seperator mb-6 center">
					<span class="sep-holder"><span class="sep-line"></span></span>
					<div class="sep-icon"><i class="organik-flower"></i></div>
					<span class="sep-holder"><span class="sep-line"></span></span>
				</div>
				<div class="contact-form-wrapper">
					<?= Form::open(array('url' => route('contact.us'),'id' =>'contact_us' ,'class' => 'contact-form' )) ?>
						<div class="row">
							<div class="col-md-6">
								<label>{{ trans('contact.your_name') }} <span class="required">*</span></label>
								<div class="form-wrap">
									<input type="text" name="name" value="" size="40" />
								</div>
								@if($errors->has('name'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
		                            </span>
		                        @endif
							</div>
							<div class="col-md-6">
								<label>{{ trans('contact.your_email') }}<span class="required">*</span></label>
								<div class="form-wrap">
									<input type="email" name="email" value="" size="40" />
								</div>
								@if($errors->has('email'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
		                            </span>
		                        @endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>{{ trans('contact.subject') }}</label>
								<div class="form-wrap">
									<input type="text" name="subject" value="" size="40" />
								</div>
								@if($errors->has('subject'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
		                            </span>
		                        @endif
							</div>
							<div class="col-md-6">
								<label>{{ trans('contact.telephone') }}</label>
								<div class="form-wrap">
									<input type="text" name="telephone" value="" size="15" />
								</div>
								@if($errors->has('telephone'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('telephone') }}</strong>
		                            </span>
		                        @endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>{{ trans('contact.message') }}</label>
								<div class="form-wrap">
									<textarea name="message" cols="40" rows="10"></textarea>
								</div>
								@if($errors->has('message'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
		                            </span>
		                        @endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-wrap text-center">
									<input type="submit" value="SEND US NOW" />
								</div>
							</div>
						</div>
					<?= Form::close() ?>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	$("#contact_us").submit(function(event){
	    var isValid = true;

	    // do all your validation here
	    // potentially if one of the fields is empty 
	    // isValid will be set to false

	    if (!isValid) {
	        event.preventDefault();
	    }
	});


	function initMap() {

		var lat = '<?php config('contact.location_lat') ?>';
		var long = '<?php config('contact.location_long') ?>';
		
        var uluru = {lat: lat, lng: long };
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 8,
          center: uluru,
		  mapTypeId: 'satellite'
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
</script>
@stop