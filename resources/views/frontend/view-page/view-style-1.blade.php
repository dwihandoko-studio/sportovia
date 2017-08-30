@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $callClass->nama_kelas }} Class</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia {{ $callClass->nama_kelas }} Class">
	<meta name="description" content="Sportopia - {{ $callClass->nama_kelas }} : {{ Str::words($callClass->deskripsi_kelas, 30) }}">
	<meta name="keywords" content="Sportopia {{ $callClass->nama_kelas }}, {{ $callClass->nama_kelas }}, Sports, Art, Games, Education " />
	<meta itemprop="thumbnailUrl" content="{{ asset('amadeo/images/class/').'/'.$callClass->img_url }}"/>
	<meta itemprop="image" content="{{ asset('amadeo/images/class/').'/'.$callClass->img_url }}" />

	<meta property="og:type" content="Article" />
	<meta property="og:site_name" content="sportopia.com">
	<meta property="og:title" content="{{ $callClass->nama_kelas }}">
	<meta property="og:url" content="{{ route('frontend.class.view', ['slug' => $callKategori->slug, 'subslug' => $callClass->slug])}}">
	<meta property="og:description" content="{{ strip_tags(Str::words($callClass->deskripsi_kelas, 75)) }}">
	<meta property="og:image" content="{{ asset('amadeo/images/class/').'/'.$callClass->img_url }}">
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/view-style-1.css')) }}">
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
					<a href="{{ Route('frontend.class.index', ['slug' => $callKategori->slug]) }}">
						{{ $callKategori->kategori_kelas }} Class
					</a>
				</label>
				<label>
					<a href="{{ Route('frontend.class.view', ['slug' => $callKategori->slug, 'subslug' => $callClass->slug]) }}">
						{{ $callClass->nama_kelas }} Class
					</a>
				</label>
			</div>
		</div>
	</div>
	<?php // view wrapper ?>
	<div id="view" class="setup-wrapper">
		<div class="setup-content lar-wd">
			<div class="bar left">
				<div class="img" style="background-image: url('{{ asset('amadeo/images/class/'.$callClass->img_url_landscape) }}');"></div>
			</div>
			<div class="bar right">
				<div class="title">
					<h1>{{ $callClass->nama_kelas }} Class</h1>
					<h1>{{ $callClass->quotes }}</h1>
				</div>
				<div class="content">
					<p>{!! $callClass->deskripsi_kelas !!}</p>
	 				<div class="text-center">
		 				<a id="register" class="btn btn-green open-form-class">Register</a>
	 				</div>
				</div>
			</div>
			<div class="clearfix"></div>
			@if($getGaleri != null)
			<div id="galeri-class" class="content-other">
				<div class="heading-CO">
					<div class="icon-CO part-heading-CO">
						<i class="fa fa-chevron-circle-down" aria-hidden="true" data-toggle="collapse" data-target="#galeri-CO"></i>
					</div>
					<div class="title-CO part-heading-CO">
						<label>Galeri Class</label>
					</div>
					<div class="hr-CO part-heading-CO">
						<hr>
					</div>
				</div>
				<div  id="galeri-CO" class="collapse body-CO">
					@foreach($getGaleri as $list)
					<div class="item">
						<div class="img" style="background-image: url('{{ asset('amadeo/images/gallery/'.$list->img_url) }}');">
							<div class="description">
								<div class="wrapper">
									<div class="content">
										<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
									</div>
								</div>
								<div class="wrapper">
									<div class="content">
										<label></label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					// <img class="img-galeri" src="{{ asset('amadeo/images/gallery/'.$list->img_url) }}" title="{{ $list->img_alt }}">
					?>
					@endforeach
				</div>
			</div>
			@endif
			@if($callClass->video_url != null)
			<div id="vidio" class="content-other">
				<div class="heading-CO">
					<div class="icon-CO part-heading-CO">
						<i class="fa fa-chevron-circle-down" aria-hidden="true" data-toggle="collapse" data-target="#vidio-CO"></i>
					</div>
					<div class="title-CO part-heading-CO">
						<label>Vidio</label>
					</div>
					<div class="hr-CO part-heading-CO">
						<hr>
					</div>
				</div>
				@php
					$url = $callClass->video_url;
					$step1=explode('v=', $url);
					$step2 =explode('&',$step1[1]);
					$vedio_id = $step2[0];
				@endphp
				<div id="vidio-CO" class="collapse body-CO">
					<div class="iframe-wrapper">
						<iframe src="https://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
						<div class="iframe-title">
							<div class="title-wrapper">
								<div class="title">
									<h1>lorem ipsum in here</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
			@if($callClass->fasilitas != null)
			<div id="fasilitas" class="content-other">
				<div class="heading-CO">
					<div class="icon-CO part-heading-CO">
						<i class="fa fa-chevron-circle-down" aria-hidden="true" data-toggle="collapse" data-target="#fasilitas-CO"></i>
					</div>
					<div class="title-CO part-heading-CO">
						<label>Fasilitas</label>
					</div>
					<div class="hr-CO part-heading-CO">
						<hr>
					</div>
				</div>
				<div  id="fasilitas-CO" class="collapse body-CO">
					@php
						$fasilitasArr = explode(",", $callClass->fasilitas)
					@endphp
					@foreach($fasilitasArr as $list)
					<div class="item">
						<div class="img list">
							<div class="description">
								<div class="wrapper">
									<div class="content">
										<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
									</div>
								</div>
								<div class="wrapper">
									<div class="content">
										<label>{{ $list }}</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
			
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
@endsection
