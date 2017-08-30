@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Our Staff</title>
@endsection

@section('meta')
	<meta name="title" content="Sportopia Staff">
	@if($callAbout != null)
		<meta name="descriptions" content="Sportopia - {{ strip_tags(Str::words($callAbout->deskripsi_tentang, 40)) }}">
	@endif
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/about-staff.css')) }}">
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
						Our Staff
					</a>
				</label>
			</div>
			<h2>Our Trainers</h2>
		</div>
	</div>
	<?php // staff wrapper ?>
	<div id="staff" class="setup-wrapper">
		<div class="setup-content lar-wd">
			<div class="staff-wrapper">
				@php ( $rowsNumber = 1 )
				@php ( $countLooping = 0 )
				@foreach($call_st as $list)
				@php
					if($countLooping % 4 == 0){
						$rowsNumber++;
					}
					$countLooping++;
				@endphp
				<div class="staff-content bar-size-4">
					<div class="img" style="background-image: url('{{ asset('amadeo/images/users/'.$list->avatar)}}')"></div>
					<div class="name-wrapper">
						<h2 class="name {{ $rowsNumber }}">
							{{ $list->nama_staff }}
						</h2>
					</div>
					<div class="name-wrapper">
						<h2 class="jobs {{ $rowsNumber }}">
							{{ $list->nama_jabatan }}
						</h2>
					</div>
					<hr>
					<p>{{ $list->quotes_staff }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/default-public.js')) }}"></script>
	<script type="text/javascript">
		// for equals height of name and job staff
		$(document).ready(function(){
			var loopingRows = {{ $rowsNumber }};
			for (loopFor = 0; loopFor < loopingRows; loopFor++) {
			    var maxHeightT = 0;
				var maxHeightB = 0;
				var rowsQue = loopingRows-loopFor;
				$('h2.name.'+rowsQue).each(function() {
					maxHeightT = maxHeightT > $(this).height() ? maxHeightT : $(this).height();
				});
			    $('h2.name.'+rowsQue).css("height", maxHeightT+"px");
			    $('h2.jobs.'+rowsQue).each(function() {
					maxHeightB = maxHeightB > $(this).height() ? maxHeightB : $(this).height();
				});
			    $('h2.jobs.'+rowsQue).css("height", maxHeightB+"px");
			}
		});
	</script>
@endsection
