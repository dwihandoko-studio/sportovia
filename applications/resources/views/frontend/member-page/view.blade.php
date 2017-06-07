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
				<a href="{{ route('frontend.member.view', ['slug'=>'slug']) }}">
					This Page
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
				<a href="" class="btn btn-green">Download Pdf</a>
			</div>
			<div class="content">
				<div class="vidio-wrapper">
					<div style="height: 300px; width: 100%; background-color: black"></div>
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
