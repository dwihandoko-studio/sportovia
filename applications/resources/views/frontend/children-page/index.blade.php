@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - {{ $callProgram->program_kelas }} Class</title>
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
	<div class="banner-content" style="background-image: url('{{ asset('amadeo/images/class/'.$callProgram->img_banner) }}');"></div>
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
				<a href="{{ Route('frontend.program.index', ['slug' => $callProgram->slug]) }}">
					{{ $callProgram->program_kelas }} Class
				</a>
			</label>
		</div>
		<h1>
			{{ $callProgram->program_kelas }} Class
		</h1>
		<h1>
			{!! $callProgram->quotes_program !!}
		</h1>
		<h3>
			{!! $callProgram->deskripsi_program !!}
		</h3>
	</div>
</div>
<?php // index wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
	@foreach($callClass as $list)
		<div class="index-wrapper">
			<div class="img-back" style="background-image: url('{{ asset('amadeo/main-image/kids-index.png') }}');">
				<h2>{{ $list->nama_kelas }}</h2>
				<div class="content">
					<div class="pict" style="background-image: url('{{ asset('amadeo/images/class/'.$list->img_url) }}');">
					</div>
					<p>{!! Str::words($list->deskripsi_kelas, 45, ' ...') !!}</p>
					<a href="{{ route('frontend.class.view', ['slug'=> $list->kategori_slug, 'subslug' => $list->kelas_slug]) }}" class="btn btn-green">
						Detail
					</a>
				</div>
			</div>
		</div>
	@endforeach
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
