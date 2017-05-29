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
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-index-style-1.css') }}">
<style type="text/css">

</style>
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
				<a href="{{ Route($routePage.'index') }}">
					{{ $titlePage }}
				</a>
			</label>
		</div>
		<h1>
			{{ $titlePage }}
		</h1>
		<h1>
			{{ $titleSubPage }}
		</h1>
		<h3>
			{{ $descriptionPage }}
		</h3>
	</div>
</div>
<?php // index wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
	@for($a=0; $a<=5; $a++)
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
	@endfor
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
