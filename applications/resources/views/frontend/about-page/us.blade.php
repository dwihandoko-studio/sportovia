@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - About Us</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-about-us.css') }}">
@endsection

@section('body-content')
<?php // banner wrapper ?>
<div id="banner">
	<div class="banner-content" style="background-image: url('{{ asset('amadeo/main-image/banner.png') }}');"></div>
</div>
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
					About Us
				</a>
			</label>
		</div>
		<h2>About Us</h2>
		<div id="description-wrapper">
			<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
		</div>
	</div>
</div>
<?php // visi and misi wrapper ?>
<div id="vam-wrapper" class="setup-wrapper">
	<div class="setup-content nor-wd">
		<div class="bar bar-size-2">
			<div class="vam-content">
				<img src="{{ asset('amadeo/main-image/card.jpg') }}">
				<div class="vam-descript-wrapper">
					<div class="bar bar-size-4">
						<div class="midle">
							<h2>Visi</h2>
						</div>
					</div>
					<div class="bar bar-size-1">
						<div class="midle">
							<p>Lorem ipsum dolor sit amet, esse possit splendide at mea, autem probatus mea eu. Erat summo sonet ius et, dicant atomorum an pro. Duo ut mazim munere aliquip. Ancillae percipitur ne ius, assum eruditi per cu. Dictas aperiri epicurei no nam, tibique intellegebat vim ne.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="bar bar-size-2">
			<div class="vam-content">
				<img src="{{ asset('amadeo/main-image/card.jpg') }}">
				<div class="vam-descript-wrapper">
					<div class="bar bar-size-4">
						<div class="midle">
							<h2>Misi</h2>
						</div>
					</div>
					<div class="bar bar-size-1">
						<div class="midle">
							<p>Lorem ipsum dolor sit amet, esse possit splendide at mea, autem probatus mea eu. Erat summo sonet ius et, dicant atomorum an pro. Duo ut mazim munere aliquip. Ancillae percipitur ne ius, assum eruditi per cu. Dictas aperiri epicurei no nam, tibique intellegebat vim ne.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
