@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Contact</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-contact.css') }}">

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
				<a href="">
					Contact
				</a>
			</label>
		</div>
		<h2>Contact</h2>
		<div id="description-wrapper">
			<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
		</div>
	</div>
</div>
<?php // contact wrapper ?>
<div id="contact" class="setup-wrapper" style="background-image: url('{{ asset('amadeo/main-image/contact.png') }}');">
	<div id="transparant-wrapper">
	<div class="setup-content lar-wd">
		<div class="bar bar-size-left">
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Marketing</p>
				</div>
				<div class="bar bar-size-1">
					@for($a=0; $a<=3; $a++)
					<p>name : 123456789012</p>
					@endfor
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Office</p>
				</div>
				<div class="bar bar-size-1">
					<p>123456789012</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Email</p>
				</div>
				<div class="bar bar-size-1">
					<p>Emails@email.email</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Adress</p>
				</div>
				<div class="bar bar-size-1">
					<p>Address in here</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="bar bar-size-right">
			<div id="form-wrapper">
				<div class="input-group error">
					<input type="text" class="form-control" placeholder="Name">
					<span class="input-group-addon">
						<i class="fa fa-users" aria-hidden="true"></i>
					</span>
				</div>
				<div class="input-group">
					<input type="text" name="" class="form-control" placeholder="Phone">
					<span class="input-group-addon">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</span>
				</div>
				<div class="input-group">
					<input type="text" name="" class="form-control" placeholder="Email Address">
					<span class="input-group-addon">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<div class="input-group">
					<input type="text" name="" class="form-control" placeholder="Subject">
					<span class="input-group-addon">
						<i class="fa fa-question" aria-hidden="true"></i>
					</span>
				</div>
				
				<textarea name="" class="form-control" placeholder="Message" rows="6"></textarea>
				<button>Submit</button>
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
