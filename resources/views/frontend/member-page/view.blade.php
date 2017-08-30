@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Member Area - View</title>
@endsection

@section('meta')
	<meta name="title" content="Member Area">
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
	<link rel="stylesheet" type="text/css" href="{{ asset(mix('amadeo/css/mix/member-view.css')) }}">
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
					<a href="{{ route('frontend.member.index') }}">
						Member Area
					</a>
				</label>
				<label>
					<a href="">
						{{ $call->nama_member }}
					</a>
				</label>
			</div>
			<h2>Member Area</h2>
			<div id="description-wrapper">
				<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
			</div>
		</div>
	</div>
	<?php // info wrapper ?>
	<div id="info" class="setup-wrapper">
		<div class="setup-content lar-wd">
			<div class="info-wrapper">
				<div class="content">
					<h2>{{ $call->nama_member }}</h2>
					<table>
						<tr>
							<td>Code Member</td>
							<td>:</td>
							<td>{{ $call->kode_member }}</td>
						</tr>
						<tr>
							<td>Program</td>
							<td>:</td>
							<td>{{ $call->program_kelas }}</td>
						</tr>
						<tr>
							<td>Category</td>
							<td>:</td>
							<td>{{ $call->kategori_kelas }}</td>
						</tr>
						<tr>
							<td>Class</td>
							<td>:</td>
							<td>{{ $call->nama_kelas }}</td>
						</tr>
						<tr>
							<td>Room</td>
							<td>:</td>
							<td>{{ $call->nama_ruang }}</td>
						</tr>
						<tr>
							<td>Floor</td>
							<td>:</td>
							<td>{{ $call->lantai_kelas }}</td>
						</tr>
						<tr>
							<td>O'clock</td>
							<td>:</td>
							<td>{{ $call->jam_mulai.' - '.$call->jam_akhir }}</td>
						</tr>
						<tr>
							<td>Day</td>
							<td>:</td>
							<td>{{ $call->hari }}</td>
						</tr>
						<tr>
							<td>Place of birth</td>
							<td>:</td>
							<td>{{ $call->tempat_lahir }}</td>
						</tr>
						<tr>
							<td>Date of birth</td>
							<td>:</td>
							<td>{{ $call->tanggal_lahir }}</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td>{{ $call->alamat }}</td>
						</tr>
					</table>
					<a href="{{ $call->dokumen_rapot }}" class="btn btn-green {{ ($call->dokumen_rapot == null ) ? 'disabled' : '' }}">
						Download Pdf
					</a>
				</div>
				<?php
				// @php
				// 	$awal = date( "H:i:s", strtotime( $call->jam_mulai ) );
				// 	$akhir = date( "H:i:s", strtotime( $call->jam_akhir ) );
				// 	$sekarang = date('H:i:s');
				// 	$hari_sekarang = date('l');
				// @endphp
				?>
				<div class="content">
					<div id="photo" class="content-other">
						<div class="heading-CO">
							<div class="icon-CO part-heading-CO">
								<i class="fa fa-chevron-circle-down" aria-hidden="true" data-toggle="collapse" data-target="#photo-CO"></i>
							</div>
							<div class="title-CO part-heading-CO">
								<label>Photo</label>
							</div>
							<div class="hr-CO part-heading-CO">
								<hr>
							</div>
						</div>
						<div id="photo-CO" class="collapse body-CO in">
								@foreach ($callPhoto as $key => $value)
								<a class="item" href="{{ asset('amadeo/images/gallery/'.$value->img_url) }}">
									<div class="img" style="background-image: url('{{ asset('amadeo/images/gallery/'.$value->img_url) }}');"></div>
								</a>
								@endforeach
						</div>
							<div class="clearfix"></div>
					</div>
					<?php /*
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
							$url = 'https://www.youtube.com/watch?v=MmeydJhyXGc&list=RDMM0v18YIwEmKE&index=27';
							$step1=explode('v=', $url);
							$step2 =explode('&',$step1[1]);
							$vedio_id = $step2[0];
						@endphp
						<div id="vidio-CO" class="collapse body-CO">
							<div class="iframe-wrapper">
								<iframe src="https://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>

					<div class="vidio-wrapper">
						@if($hari_sekarang == $call->hari && $sekarang > $awal && $sekarang < $akhir)
						<p>link cctv = {{ $call->link_cctv }}</p>
						@else
						<div style="background-color: black; width: 100%;
						height: 300px;">
						</div>
						@endif
					</div>
					*/ ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@endsection

@section('footer-script')
	<script src="{{ asset(mix('amadeo/js/mix/member-view.js')) }}"></script>
	<script>
		$(function(){
			var $gallery = $('#photo-CO a').simpleLightbox();

			$gallery.on('show.simplelightbox', function(){
				console.log('Requested for showing');
			})
			.on('shown.simplelightbox', function(){
				console.log('Shown');
			})
			.on('close.simplelightbox', function(){
				console.log('Requested for closing');
			})
			.on('closed.simplelightbox', function(){
				console.log('Closed');
			})
			.on('change.simplelightbox', function(){
				console.log('Requested for change');
			})
			.on('next.simplelightbox', function(){
				console.log('Requested for next');
			})
			.on('prev.simplelightbox', function(){
				console.log('Requested for prev');
			})
			.on('nextImageLoaded.simplelightbox', function(){
				console.log('Next image loaded');
			})
			.on('prevImageLoaded.simplelightbox', function(){
				console.log('Prev image loaded');
			})
			.on('changed.simplelightbox', function(){
				console.log('Image changed');
			})
			.on('nextDone.simplelightbox', function(){
				console.log('Image changed to next');
			})
			.on('prevDone.simplelightbox', function(){
				console.log('Image changed to prev');
			})
			.on('error.simplelightbox', function(e){
				console.log('No image found, go to the next/prev');
				console.log(e);
			});
		});
	</script>
@endsection
