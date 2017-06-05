@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $call->judul }}</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - {{ $call->judul }} : {{ Str::words($call->deskripsi, 30) }}">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-news-event-view.css') }}">
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
				{{ $call->deskripsi }}
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
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
