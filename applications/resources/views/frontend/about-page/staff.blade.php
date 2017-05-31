@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Our Staff</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-our-staff.css') }}">
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
		<h2>Our Staff</h2>
	</div>
</div>
<?php // staff wrapper ?>
<div id="staff" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div class="staff-wrapper">
			@foreach($call_st as $list)
			<div class="staff-content bar-size-4">
				<div class="img" style="background-image: url('{{ asset('amadeo/images/users/'.$list->avatar)}}')"></div>
				<div class="name-wrapper st">
					<h2 class="name st">
						{{ $list->nama_staff }}
					</h2>
					<h2 class="jobs st">
						{{ $list->nama_jabatan }}
					</h2>
				</div>
				<hr>
				<p>{{ $list->quotes_staff }}</p>
			</div>
			@endforeach
		</div>
		<div class="staff-wrapper">
			@php ( $rowsNumber = 1 )
			@php ( $countLooping = 0 )
			@foreach($call_nd as $list)
			@php 
				if($countLooping % 4 == 0){
					$rowsNumber++;
				}
				$countLooping++;
			@endphp
			<div class="staff-content bar-size-4">
				<div class="img" style="background-image: url('{{ asset('amadeo/images/users/'.$list->avatar)}}')"></div>
				<div class="name-wrapper nd">
					<h2 class="name nd {{ $rowsNumber }}">
						{{ $list->nama_staff }}
					</h2>
					<h2 class="jobs nd {{ $rowsNumber }}">
						{{ $list->nama_jabatan }}
					</h2>
				</div>
				<hr>
			</div>
			@endforeach
		</div>

	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
// for equals height of name and job staff
$(document).ready(function(){
	
	var maxHeightStT = 0;
	var maxHeightStB = 0;

	$('h2.name.st').each(function() {
		maxHeightStT = maxHeightStT > $(this).height() ? maxHeightStT : $(this).height();
	});
    $('h2.name.st').css("height", maxHeightStT+"px");
    $('h2.jobs.st').each(function() {
		maxHeightStB = maxHeightStB > $(this).height() ? maxHeightStB : $(this).height();
	});
    $('h2.jobs.st').css("height", maxHeightStB+"px");
    

	var loopingRows = {{ $rowsNumber }};
	for (loopFor = 0; loopFor < loopingRows; loopFor++) {
	    var maxHeightNdT = 0;
		var maxHeightNdB = 0;
		var rowsQue = loopingRows-loopFor;
		$('h2.name.nd.'+rowsQue).each(function() {
			maxHeightNdT = maxHeightNdT > $(this).height() ? maxHeightNdT : $(this).height();
		});
	    $('h2.name.nd.'+rowsQue).css("height", maxHeightNdT+"px");
	    $('h2.jobs.nd.'+rowsQue).each(function() {
			maxHeightNdB = maxHeightNdB > $(this).height() ? maxHeightNdB : $(this).height();
		});
	    $('h2.jobs.nd.'+rowsQue).css("height", maxHeightNdB+"px");
	}
});
</script>
@endsection
