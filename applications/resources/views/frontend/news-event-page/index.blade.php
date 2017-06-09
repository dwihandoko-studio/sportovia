@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - News & Event</title>
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
				<a href="{{ Route('frontend.news-event.index') }}">
					News & Event
				</a>
			</label>

		</div>
		<h1>
			News & Event
		</h1>
		<h3>
			Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. 
		</h3>
	</div>
</div>
<?php // banner wrapper ?>
<div id="banner">
	<div class="banner-content" style="background-image: url('{{ asset('amadeo/images/news-event/'.$callEventNew->img_banner) }}');">
		<div class="setup-wrapper">
			<div class="setup-content lar-wd">
				<div class="wrapper-description">
					<h3>Event</h3>
					<h2>{{ $callEventNew->judul }}</h2>
					<p>{!! Str::words($callEventNew->deskripsi, 65) !!}</p>
					<div class="for-btn">
						<a class="btn btn-green open-form-class">
							Register
						</a>
						<a href="{{ Route('frontend.news-event.view', ['slug'=>$callEventNew->slug ]) }}" class="btn btn-green">
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
			@foreach($callEvent as $list)
			<div class="item">
				<a href="{{ Route('frontend.news-event.view', ['slug'=>$list->slug ]) }}">
					<div class="index-wrapper">
						<div class="img-back" style="background-image: url('{{ asset('amadeo/images/news-event/'.$list->img_thumb) }}');">
							<div class="img-description-wrapper">
								<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
								<p>{!! Str::words($list->deskripsi, 35) !!}</p>
							</div>
						</div>
						<div class="index-title-wrapper">
							<div class="title-content">
								<h3>{{ $list->judul }}</h3>
							</div>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php // index 2 wrapper ?>
<div id="index-nd" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<h1 class="title">News</h1>
		<div class="owl-wrapper-nd">
			@foreach($callNews as $list)
			<div class="item">
				<a href="{{ Route('frontend.news-event.view', ['slug'=>$list->slug ]) }}">
					<div class="index-nd-wrapper">
						<div class="img" style="background-image: url('{{ asset('amadeo/images/news-event/'.$list->img_thumb) }}');"></div>
						<div class="content-wrapper">
							<h3>{{ $list->judul }}</h3>
							<p>
								{!! Str::words($list->deskripsi, 20) !!}
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
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
