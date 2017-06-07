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
		@for($a=0; $a<=2; $a++)
		<div class="info-wrapper">
			<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');">
			</div>
			<div class="content">
				<h2>Name Children In Here</h2>
				<table>
					<tr>
						<td>Code Member</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Jadwal</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Hari</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Ruang</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>bla bla bla bla</td>
					</tr>
				</table>

				<a href="{{ route('frontend.member.view', ['slug'=>$a]) }}" class="btn btn-green">Lihat</a>
			</div>
		</div>
		@endfor
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
