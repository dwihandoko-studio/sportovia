@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $callKategori->kategori_kelas }} Class</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia {{ $callKategori->kategori_kelas }} Class">
	@if($callKategori != null)
		<meta name="descriptions" content="Sportopia - {{ strip_tags(Str::words($callKategori->deskripsi_kategori, 40)) }}">
	@endif
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
	<meta itemprop="thumbnailUrl" content="{{ asset('amadeo/images/class/').'/'.$callKategori->img_thumb }}"/>
	<meta itemprop="image" content="{{ asset('amadeo/images/class/').'/'.$callKategori->img_banner }}" />

	<meta property="og:type" content="Article" />
	<meta property="og:site_name" content="sportopia.com">
	<meta property="og:title" content="{{ $callKategori->kategori_kelas }}">
	<meta property="og:url" content="{{ route('frontend.class.index', ['slug' => $callKategori->slug])}}">
	<meta property="og:description" content="{{ strip_tags(Str::words($callKategori->deskripsi_kategori, 35)) }}">
	<meta property="og:image" content="{{ asset('amadeo/images/class/').'/'.$callKategori->img_thumb }}">
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/category-index.css')) }}">

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
				{!! $callKategori->quotes_kategori !!}
			</h1>
			<h3>
				{!! $callKategori->deskripsi_kategori !!}
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
							<p>{!! Str::words($list->deskripsi_kelas, 40) !!}</p>
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
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection
