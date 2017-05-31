@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $titlePage }}</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-index-style-1.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-news-event-index.css') }}">

@endsection

@section('body-content')
<?php // index and description wrapper ?>
<div id="iad" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div id="index-wrapper">
			<label>
				<a href="{{ Route('frontend.home') }}">
					Home
				</a>
			</label>
			<label>
				<a href="{{ Route($routePage.'index') }}">
					{{ $titlePage }}
				</a>
			</label>

		</div>
		<h1>
			{{ $titlePage }}
		</h1>
		<h3>
			Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. 
		</h3>
	</div>
</div>
<?php // banner wrapper ?>
<div id="banner">
	<div class="banner-content" style="background-image: url('{{ asset('amadeo/main-image/banner.png') }}');">
		<div class="setup-wrapper">
			<div class="setup-content lar-wd">
				<div class="wrapper-description">
					<h3>Event</h3>
					<h2>Yoga Healthy Day</h2>
					<p>
						Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur signiferumque ne sed, hinc ubique dolorem ei qui. Sit eu convenire consulatu, vis id novum expetenda persequeris.
					</p>
					<div class="for-btn">
						<a href="" class="btn btn-green">
							Register
						</a>
						<a href="{{ Route($routePage.'view', ['slug'=>'$a' ]) }}" class="btn btn-green">
							Detail
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php // index 1 wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div class="owl-wrapper">
			@for($a=0; $a<=15; $a++)
			<div class="item">
				<a href="{{ Route($routePage.'view', ['slug'=>$a ]) }}">
					<div class="index-wrapper">
						<div class="img-back" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');">
							<div class="img-description-wrapper">
								<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
								<p>Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer,Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer,Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer</p>
							</div>
						</div>
						<div class="index-title-wrapper">
							<div class="title-content">
								<h3>title in here title in here</h3>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endfor
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php // index 2 wrapper ?>
<div id="index-nd" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<h1 class="title">News</h1>
		<div class="owl-wrapper-nd">
			@for($a=0; $a<=6; $a++)
			<div class="item">
				<a href="{{ Route($routePage.'view', ['slug'=>$a ]) }}">
					<div class="index-nd-wrapper">
						<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');"></div>
						<div class="content-wrapper">
							<h3>Title in here</h3>
							<p>
								Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an.
							</p>
						</div>
					</div>
				</a>
			</div>
			@endfor
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".owl-wrapper").owlCarousel({
      navigation : true, // Show next and prev buttons
      items: 4,
      pagination:false,
      navigationText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"]
 
    });
    $(".owl-wrapper-nd").owlCarousel({
      navigation : true, // Show next and prev buttons
      items: 3,
      pagination:false,
      navigationText : ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"]
 
    });
})
</script>
@endsection