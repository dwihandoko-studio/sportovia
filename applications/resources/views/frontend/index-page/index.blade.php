@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $callKategori->kategori_kelas }} Class</title>
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
	<div class="banner-content" style="background-image: url('{{ asset('amadeo/images/class/'.$callKategori->img_banner) }}');"></div>
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
				<a href="{{ Route('frontend.class.index', ['slug' => $callKategori->slug]) }}">
					{{ $callKategori->kategori_kelas }} Class
				</a>
			</label>
		</div>
		<h1>
			{{ $callKategori->kategori_kelas }} Class
		</h1>
		<h1>
			{{ $callKategori->quotes_kategori }}
		</h1>
		<h3>
			{{ $callKategori->deskripsi_kategori }}
		</h3>
	</div>
</div>
<?php // index wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
	@foreach($callClass as $list)
		<a href="{{ Route('frontend.class.view', ['slug' => $callKategori->slug, 'subslug' => $list->slug]) }}">
			<div class="index-wrapper">
				<div class="img-back" style="background-image: url('{{ asset('amadeo/images/class/'.$list->img_url) }}');">
					<div class="img-description-wrapper">
						<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
						<p>{{ Str::words($list->deskripsi_kelas, 40) }}</p>
					</div>
				</div>
				<div class="index-title-wrapper">
					<div class="title-content">
						<h3>{{ $list->nama_kelas }}</h3>
					</div>
				</div>
			</div>
		</a>
	@endforeach
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
