@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - </title>
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
				<a href="{{ Route($routePage) }}">
					{{ $indexPage }}
				</a>
			</label>
			<label>
				<a href="">
					This Page
				</a>
			</label>
		</div>
	</div>
</div>
<?php // view wrapper ?>
<div id="view" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div class="bar left">
			<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');"></div>
		</div>
		<div class="bar right">
			<div class="title">
				<h1>Title in here</h1>
				<h1>Sub Title for description in here</h1>
			</div>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur signiferumque ne sed, hinc ubique dolorem ei qui. Sit eu convenire consulatu, vis id novum expetenda persequeris.</p>
 
 				<p>Per stet alienum principes an. Id qui commune iudicabit, vel exerci reprehendunt necessitatibus an.Usu aperiam viderer te. Id soleat suavitate philosophia vel, semper latine blandit ius id, ius magna zril ea. Docendi volutpat definitionem cu nec.An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur signiferumque ne sed, hinc ubique dolorem ei qui. Sit eu convenire consulatu, 	vis id novum expetenda persequerisAssum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque. Ea quis referrentur vix, quo an tota soluta electram. Scribentur signiferumque ne sed, hinc ubique dolorem ei qui. Sit</p>
 				
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
				@for($a=0; $a<=3; $a++)
				<div class="item">
					<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');">
						<div class="description">
							<div class="wrapper">
								<div class="content">
									<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
								</div>
							</div>
							<div class="wrapper">
								<div class="content">
									<label>title in here</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>
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
			<div id="vidio-CO" class="collapse body-CO">
				<iframe src="https://www.youtube.com/embed/1VFIpg-xKLY?list=RDkihTFSwsdTI" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
