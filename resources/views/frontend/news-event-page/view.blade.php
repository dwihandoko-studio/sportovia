@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $call->judul }}</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia {{ $call->judul }}">
	<meta name="description" content="Sportopia - {{ $call->judul }} : {{ strip_tags(Str::words($call->deskripsi, 45)) }}">
	<meta name="keywords" content="Sportopia News Event, Sport, Art, Games, Education" />
	<meta itemprop="thumbnailUrl" content="{{ asset('amadeo/images/news-event/').'/'.$call->img_thumb }}"/>
	<meta itemprop="image" content="{{ asset('amadeo/images/news-event/').'/'.$call->img_banner }}" />

	<meta property="og:type" content="Article" />
	<meta property="og:site_name" content="sportopia.com">
	<meta property="og:title" content="{{ $call->judul }}">
	<meta property="og:url" content="{{ route('frontend.news-event.view', ['slug' => $call->slug])}}">
	<meta property="og:description" content="{{ strip_tags(Str::words($call->deskripsi_kategori, 35)) }}">
	<meta property="og:image" content="{{ asset('amadeo/images/news-event/').'/'.$call->img_banner }}">
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/news-event-view.css')) }}">
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
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
				<label>
					<a href="{{ Route('frontend.news-event.view', ['slug'=>$call->slug]) }}">
						{{ $call->judul }}
					</a>
				</label>
			</div>
		</div>
	</div>
	<?php // view wrapper ?>
	<div id="view" class="setup-wrapper">
		<div class="setup-content nor-wd">
			<div id="img-view" style="background-image: url('{{ asset('amadeo/images/news-event/'.$call->img_banner) }}')"></div>
			<div class="view-content">
				<h2>{{ $call->news_event == 1 ? 'News' : 'Event' }}</h2>
				<h1>{{ $call->judul }}</h1>
				<p>
					{!! $call->deskripsi !!}
				</p>
				@if($call->news_event == 0)
				<div class="for-btn">
					<a class="btn btn-green open-form-class">
						Register
					</a>
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection
