@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Member Area - My Area</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - Member Area">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-member-index.css') }}">

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
		@php ($oldMember = "")
		@foreach($call as $list)
		@if($oldMember != $list->kode_member)
		@php ($oldMember = $list->kode_member)
		<div class="info-wrapper">
			<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');">
			</div>
			<div class="content">
				<h2>{{ $list->nama_member }}</h2>
				<table>
					<tr>
						<td>Code Member</td>
						<td>:</td>
						<td>{{ $list->kode_member }}</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>{{ $list->tempat_lahir }}</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>{{ $list->tanggal_lahir }}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>{{ $list->alamat }}</td>
					</tr>
				</table>
				<table class="table">
					<tr>
						<td>Class</td>
						<td>Schedule</td>
						<td></td>
					</tr>
					@foreach($call as $listNd)
					@if($listNd->kode_member == $list->kode_member)
					<tr>
						<td>
							{{ $list->nama_kelas }}
						</td>
						<td>
							{{ $list->hari.', '.$list->jam_mulai.' - '.$list->jam_akhir }}
						</td>
						<td>
							<a href="{{ route('frontend.member.view', ['slug'=>$list->kode_member]) }}">
								View
							</a>
						</td>
					</tr>
					@endif
					@endforeach			
				</table>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
