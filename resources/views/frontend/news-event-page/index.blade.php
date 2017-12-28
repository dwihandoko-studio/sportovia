@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - News & Events</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia News & Events">
	@if($callAbout != null)
		<meta name="descriptions" content="Sportopia - {{ strip_tags(Str::words($callAbout->deskripsi_tentang, 40)) }}">
	@endif
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/news-event-index.css')) }}">
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
				{{ $callConfigContent->descrip }}
			</h3>
		</div>
	</div>
	<?php // banner wrapper ?>
	@if($callEventNew != null)
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
	@endif
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
	<script src="{{ asset(mix('amadeo/js/mix/news-event-index.js')) }}"></script>
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
