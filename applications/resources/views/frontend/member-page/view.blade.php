@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Member Area - View</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<style type="text/css">
	#info{
		padding: 40px 0px;
	}
	#info .info-wrapper{
		background-color: rgb(232,255,226);
		width: 100%;
		text-align: center;
	}
	#info .info-wrapper .content{
		float: left;
		padding: 20px;
	}
	#info .info-wrapper .content:nth-child(odd){
		width: 45%;
	}
	#info .info-wrapper .content:nth-child(even){
		width: 55%;
	}
	#info .info-wrapper .content h2{
		text-align: center;
		font-family: 'open sans';
	    font-weight: bolder;
		color: rgb(69,186,1);
		text-transform: uppercase;
	}
	#info .info-wrapper .content table{
		width: 80%;
		margin: 0 auto 15px;
	}
	#info .info-wrapper .content table tr{
		margin-bottom: 10px; 
	}
	#info .info-wrapper .content table tr td{
		font-family: 'open sans';
	    font-weight: bold;
		color: rgb(166,166,166);	
		text-align: left;
	}
	#info .info-wrapper .content .vidio-wrapper{
		width: 100%;
		padding: 20px;
		border: 5px solid rgb(255,255,255);
	}
	@media (max-width: 480px) {
		#info .info-wrapper .content:nth-child(odd),
		#info .info-wrapper .content:nth-child(even){
			width: 100%;
		}
	}
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
						<td>Kategori</td>
						<td>:</td>
						<td>{{ $call->kategori_kelas }}</td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td>{{ $call->nama_kelas }}</td>
					</tr>
					<tr>
						<td>Ruang</td>
						<td>:</td>
						<td>{{ $call->nama_ruang }}</td>
					</tr>
					<tr>
						<td>Lantai</td>
						<td>:</td>
						<td>{{ $call->lantai_kelas }}</td>
					</tr>
					<tr>
						<td>Jadwal</td>
						<td>:</td>
						<td>{{ $call->jam_mulai.' - '.$call->jam_akhir }}</td>
					</tr>
					<tr>
						<td>Hari</td>
						<td>:</td>
						<td>{{ $call->hari }}</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>{{ $call->tempat_lahir }}</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>{{ $call->tanggal_lahir }}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>{{ $call->alamat }}</td>
					</tr>
				</table>
				<a href="{{ $call->dokumen_rapot }}" class="btn btn-green {{ ($call->dokumen_rapot == null ) ? 'disabled' : '' }}">
					Download Pdf
				</a>
			</div>
			@php
				$awal = date( "H:i:s", strtotime( $call->jam_mulai ) );
				$akhir = date( "H:i:s", strtotime( $call->jam_akhir ) );
				$sekarang = date('H:i:s');
				$hari_sekarang = date('l');
			@endphp
			<div class="content">
				<div class="vidio-wrapper">
					@if($hari_sekarang == $call->hari && $sekarang > $awal && $sekarang < $akhir)
					<p>link cctv = {{ $call->link_cctv }}</p>
					@else
					<div style="background-color: black; width: 100%;
					height: 300px;">
					</div>
					@endif
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
