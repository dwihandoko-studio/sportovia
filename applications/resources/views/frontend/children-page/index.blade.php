@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Children Class</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-children-index.css') }}">
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
			Lorem ipsum dolor sit amet
		</h1>
		<h3>
			Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu
		</h3>
	</div>
</div>
<?php // index wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
	@for($a=0; $a<=5; $a++)
		<div class="index-wrapper">
			<div class="img-back" style="background-image: url('{{ asset('amadeo/main-image/kids-index.png') }}');">
				<h2>Title In Here</h2>
				<div class="content">
					<div class="pict" style="background-image: url('{{ asset('amadeo/main-image/kids-index-pict.png') }}');">
					</div>
					<p>	Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
					<a href="{{ route($routePage.'view', ['slug'=>$a]) }}" class="btn btn-green">Detail</a>
				</div>
			</div>
		</div>
	@endfor
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
