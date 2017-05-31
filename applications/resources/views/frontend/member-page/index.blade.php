@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Member</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-member-index.css') }}">

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
				<input type="text" class="form-control error" placeholder="User Name">
				<input type="password" name="" class="form-control" placeholder="Password">
				<div class="text-center">
					<button>Login</button>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
