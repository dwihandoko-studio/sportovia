@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $callClass->nama_kelas }} Class</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-view-style-1.css') }}">
<style type="text/css">

</style>
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
			<div class="img" style="background-image: url('{{ asset('amadeo/images/class/'.$callClass->img_url) }}');"></div>
		</div>
		<div class="bar right">
			<div class="title">
				<h1>{{ $callClass->nama_kelas }} Class</h1>
				<h1>{{ $callClass->quotes }}</h1>
			</div>
			<div class="content">
				<p>{{ $callClass->deskripsi_kelas }}</p>
 				<div class="text-center">
	 				<a href="" class="btn btn-green">Register</a>
 				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div id="fasilitas" class="content-other">
			<div class="heading-CO">
				<div class="title-CO part-heading-CO">
					<label>Fasilitas</label>
				</div>
				<div class="hr-CO part-heading-CO">
					<hr>
				</div>
				<div class="icon-CO part-heading-CO">
					<i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#fasilitas-CO"></i>
				</div>
			</div>
			<div  id="fasilitas-CO" class="collapse body-CO">
				@php 
					$fasilitasArr = explode(",", $callClass->fasilitas)
				@endphp
				@foreach($fasilitasArr as $list)
				<div class="item">
					<div class="img">
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
		@if($callClass->video_url != null)
		<div id="vidio" class="content-other">
			<div class="heading-CO">
				<div class="title-CO part-heading-CO">
					<label>Vidio</label>
				</div>
				<div class="hr-CO part-heading-CO">
					<hr>
				</div>
				<div class="icon-CO part-heading-CO">
					<i class="fa fa-chevron-down" aria-hidden="true" data-toggle="collapse" data-target="#vidio-CO"></i>
				</div>
			</div>
			@php
				$url = $callClass->video_url;
				$step1=explode('v=', $url);
				$step2 =explode('&',$step1[1]);
				$vedio_id = $step2[0];
			@endphp
			<div id="vidio-CO" class="collapse body-CO">
				<iframe src="https://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
