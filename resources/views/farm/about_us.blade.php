@extends('layouts.layout')
@section('title',trans('about_us.about_us'))
@section('content')
<div class="section pt-10 pb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mb-1 section-pretitle">{{ trans('about_us.welcome')}} {{ LOGONAME }}!</div>
				<h2 class="text-center section-title mtn-2">{{ trans('about_us.little_story') }}</h2>
				<div class="organik-seperator mb-9 center">
					<span class="sep-holder"><span class="sep-line"></span></span>
					<div class="sep-icon"><i class="organik-flower"></i></div>
					<span class="sep-holder"><span class="sep-line"></span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="about-main-img col-lg-6">
				<img src="{{ asset('images/jangolo-about-us.jpg') }}" alt="" />
			</div>
			<div class="about-content col-lg-6">
				<div class="about-content-title">
					<h4>{{ trans('about_us.family_farm') }}</h4>
					<div class="about-content-title-line"></div>
				</div>
				<div class="about-content-text">
					<p>{{ trans('about_us.farm_msg') }}	</p>
					<p> {{ trans('about_us.visit_site') }}<br></p>
				</div>
				<div class="about-carousel" data-auto-play="true" data-desktop="4" data-laptop="4" data-tablet="4" data-mobile="2">
					<a href="{{ IMAGE_PATH.'carousel/img_large_1.jpg'  }}" data-rel="prettyPhoto[gallery]">
						<img src="{{ IMAGE_PATH.'carousel/img_1.jpg'  }}" alt="" /> 
						<span class="ion-plus-round"></span> 
					</a>
					<a href="{{ IMAGE_PATH.'carousel/img_large_2.jpg'  }}" data-rel="prettyPhoto[gallery]">
						<img src="{{ IMAGE_PATH.'carousel/img_2.jpg'  }}" alt="" /> 
						<span class="ion-plus-round"></span> 
					</a>
					<a href="{{ IMAGE_PATH.'carousel/img_large_3.jpg'  }}" data-rel="prettyPhoto[gallery]">
						<img src="{{ IMAGE_PATH.'carousel/img_3.jpg'  }}" alt="" /> 
						<span class="ion-plus-round"></span> 
					</a>
					<a href="{{ IMAGE_PATH.'carousel/img_large_4.jpg'  }}" data-rel="prettyPhoto[gallery]">
						<img src="{{ IMAGE_PATH.'carousel/img_4.jpg'  }}" alt="" /> 
						<span class="ion-plus-round"></span> 
					</a>
					<a href="{{ IMAGE_PATH.'carousel/img_large_5.jpg'  }}" data-rel="prettyPhoto[gallery]">
						<img src="{{ IMAGE_PATH.'carousel/img_5.jpg'  }}" alt="" /> 
						<span class="ion-plus-round"></span> 
					</a>
					<a href="{{ IMAGE_PATH.'carousel/img_large_6.jpg'  }}" data-rel="prettyPhoto[gallery]">
						<img src="{{ IMAGE_PATH.'carousel/img_6.jpg'  }}" alt="" /> 
						<span class="ion-plus-round"></span> 
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section bg-light pt-16 pb-6">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mb-1 section-pretitle">{{ trans('about_us.why_choose_us') }}</div>
				<div class="organik-seperator mb-9 center">
					<span class="sep-holder"><span class="sep-line"></span></span>
					<div class="sep-icon"><i class="organik-flower"></i></div>
					<span class="sep-holder"><span class="sep-line"></span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<div class="icon-boxes">
					<div class="icon-boxes-icon"><i class="ion-android-star-outline"></i></div>
					<div class="icon-boxes-inner">
						<h6 class="icon-boxes-title"> {{ trans('about_us.our_mission') }}</h6>
						<p>{{ trans('about_us.our_mission_msg') }}</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="text-center">
					<img src="images/about_pic.png" alt="" />
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="icon-boxes right">
					<div class="icon-boxes-icon"><i class="organik-broccoli"></i></div>
					<div class="icon-boxes-inner">
						<h6 class="icon-boxes-title"> {{ trans('about_us.our_service') }}</h6>
						<p>{{ trans('about_us.our_service_msg') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section border-bottom pt-11 pb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mb-1 section-pretitle">{{ trans('about_us.our_farmer') }}</div>
				<h2 class="text-center section-title mtn-2">{{ trans('about_us.farmer_msg') }}</h2>
				<div class="organik-seperator center mb-8">
					<span class="sep-holder"><span class="sep-line"></span></span>
					<div class="sep-icon"><i class="organik-flower"></i></div>
					<span class="sep-holder"><span class="sep-line"></span></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-12">
				<div class="team-member">
					<div class="image">
						<img src="images/testimonial/picture_3.jpg" alt="Michael Andrews" />
					</div>
					<div class="team-info">
						<h5 class="name">{{ trans('about_us.micheal') }}</h5>
						<p class="bio">{{ trans('about_us.micheal_desc') }}</p>
						<ul class="social-list">
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="team-member">
					<div class="image">
						<img src="images/testimonial/picture_4.jpg" alt="Kathleen Barsotti" />
					</div>
					<div class="team-info">
						<h5 class="name">{{ trans('about_us.kathleen') }}</h5>
						<p class="bio">{{ trans('about_us.kathleen_desc') }}</p>
						<ul class="social-list">
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="team-member">
					<div class="image">
						<img src="images/testimonial/picture_2.jpg" alt="Mark Ronson" />
					</div>
					<div class="team-info">
						<h5 class="name">{{ trans('about_us.mark') }}</h5>
						<p class="bio">{{ trans('about_us.mark_desc') }}</p>
						<ul class="social-list">
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section pt-2 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="client-carousel" data-auto-play="true" data-desktop="5" data-laptop="3" data-tablet="3" data-mobile="2">
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/Cito_Bio _Nature.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/kenza_market.png' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/mixfoods.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/sango_agri.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                        <div class="client-item">
                            <a href="#" target="_blank">
                                <img src="{{ IMAGE_PATH.'/partners/tanty.jpg' }}" alt="" height="120px" width="81px" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection