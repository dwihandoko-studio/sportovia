@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Our Staff</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
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
				<a href="{{ Route($routePage) }}">
					{{ $indexPage }}
				</a>
			</label>
			<label>
				<a href="">
					This Page
				</a>
			</label>
		</div>
	</div>
</div>
<?php // view wrapper ?>
<div id="view" class="setup-wrapper">
	<div class="setup-content nor-wd">
		<div id="img-view" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}')"></div>
		<div class="view-content">
			<h2>Event</h2>
			<h1>Title in here</h1>
			<p>
				Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur signiferumque ne sed, hinc ubique dolorem ei qui. Sit eu convenire consulatu, vis id novum expetenda persequeris.Per stet alienum principes an. Id qui commune iudicabit, vel exerci reprehendunt necessitatibus an. Usu aperiam viderer te. Id soleat suavitate philosophia vel, semper latine blandit ius id, ius magna zril ea.
			</p>
			<p>
				Docendi volutpat definitionem cu nec.An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur gniferumque ne sed, hinc ubique dolorem ei qui. Sit eu convenire consulatu, 	vis id novum expetenda persequerisAssum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur signiferumque ne sed, hinc ubique dolorem ei qui. Sit
			</p>
			<div class="for-btn">
				<a href="" class="btn btn-green">
					Register
				</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
