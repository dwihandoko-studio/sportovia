@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Member Area - Log In</title>
@endsection

@section('meta')
	<meta name="title" content="Member Area">
	@if($callAbout != null)
		<meta name="descriptions" content="Sportopia - {{ strip_tags(Str::words($callAbout->deskripsi_tentang, 40)) }}">
	@endif
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/member-log-in.css')) }}">
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
					<a href="">
						Member Area
					</a>
				</label>
			</div>
			<h2>Member Area</h2>
			<div id="description-wrapper">
				<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
			</div>
		</div>
	</div>
	<?php // login wrapper ?>
	<div id="login" class="setup-wrapper" style="background-image: url('{{ asset('amadeo/main-image/contact.png') }}');">
		<div id="transparant-wrapper">
		<div class="setup-content lar-wd">
			<div class="bar bar-size">
				<div id="form-wrapper">
					<h1>Login</h1>
					<h1>For Access</h1>
					<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea.</p>

					@if(Session::has('log_user_info'))
					<div class="info">
						<p>{{Session('log_user_info')}}</p>
					</div>
					@endif

					<form action="{{ route('frontend.member.post') }}" method="post">
						{{ csrf_field() }}
						<input type="text" class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email" name="email" value="{{ old('email')}}">
						<input type="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}" placeholder="Password" name="password">
						<div class="text-center">
							<button>Login</button>
						</div>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection
