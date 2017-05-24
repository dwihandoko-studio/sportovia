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
<style type="text/css">
	#contact{
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
	}
	#contact #transparant-wrapper{
		background-color: rgba(0,0,0,.4);
		width: 100%;
		height: 100%;
		position: relative;
	}
	#contact .setup-content{
		padding-top: 30px;
		padding-bottom: 30px;
	}
	#contact .bar.bar-size-left{
		width: 35%;
		padding-right: 2.5%;  
	}
	#contact .bar.bar-size-right{
		width: 65%;
		padding-left: 2.5%;  
	}
	#contact .bar .contact-info-wrapper{
		position: relative;
		padding-bottom: 10px;
		margin-bottom: 10px;
		border-bottom: 2px solid rgb(255,255,255);
	}
	#contact .bar .contact-info-wrapper:last-child{
		border-bottom: 2px solid rgba(255,255,255,0);	
	}
	#contact .bar .contact-info-wrapper p{
	    font-family: 'open sans';
		color: rgb(255,255,255);
		margin-bottom: 5px;
	}
	#contact #form-wrapper{
		position: relative;
		text-align: center;
	}
	#contact #form-wrapper .input-group{
		margin-bottom: 10px;
	}
	#contact #form-wrapper .input-group input{
		color: rgb(255,255,255);
		border: .5px solid rgba(255,255,255,.5);
		border-right: .5px solid rgba(255,255,255,0);
		border-radius: 0px;
		background-color: rgba(255,255,255,.45);

	}
	#contact #form-wrapper .input-group span{
		color: rgb(255,255,255);
		border-radius: 0px;
		background-color: rgba(255,255,255,.45);
		border: .5px solid rgba(255,255,255,.5);
		border-left: .5px solid rgba(255,255,255,0);
	}
	#contact #form-wrapper .input-group.error input,
	#contact #form-wrapper .input-group.error span{
		background-color: rgba(255,0,0,.45);
	}
	#contact #form-wrapper textarea{
		margin-bottom: 10px;
		color: rgb(255,255,255);
		border-radius: 0px;
		background-color: rgba(255,255,255,.45);
	}
	#contact #form-wrapper input::-webkit-input-placeholder,
	#contact #form-wrapper textarea::-webkit-input-placeholder{
		color: rgb(255,255,255);
	}
	#contact #form-wrapper button{
		font-family: 'open sans';
	    font-weight: bolder;
		color: rgb(255,255,255);
		background-color: rgb(69,186,1);
		border: 2px solid rgb(69,186,1);
		margin: 0 auto;
		padding: 5px 10px;
		transition: all .51s;
	}
	#contact #form-wrapper button:hover{
		color: rgb(69,186,1);
		background-color: rgb(255,255,255);
	}
</style>
@endsection

@section('body-content')
<?php // index and description wrapper ?>
<div id="iad" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div id="index-wrapper">
			@for($a=0; $a<=2; $a++)
			<label>
				<a href="">
					index
				</a>
			</label>
			@endfor
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
