@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Contact</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia Contact">
@if($callAbout != null)
	<meta name="descriptions" content="Sportopia - {{ strip_tags(Str::words($callAbout->deskripsi_tentang, 40)) }}">
@endif
	<meta name="keywords" content="Sportopia, Sport, Art, Games, Education" />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-public-sub.css') }}">
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
		@if($call != null)
		<div class="bar bar-size-left">
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Marketing</p>
				</div>
				<div class="bar bar-size-1">
					<p>{!! $call->marketing !!}</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Office</p>
				</div>
				<div class="bar bar-size-1">
					<p>{!! $call->office !!}</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Email</p>
				</div>
				<div class="bar bar-size-1">
					<p>{!! $call->email !!}</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="contact-info-wrapper">
				<div class="bar bar-size-4">
					<p>Adress</p>
				</div>
				<div class="bar bar-size-1">
					<p>{!! $call->alamat !!}</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		@endif
		<div class="bar bar-size-right">
			<div id="form-wrapper">
				@if(Session::has('contact_info'))
					<p class="info">{{ Session::get('contact_info') }}</p>
				@endif
				<form method="post" action="{{ route('frontend.store.contact') }}">
					{{ csrf_field() }}
					<div class="input-group {{ $errors->has('contact_name') ? 'error' : '' }}">
						<label>
							{{ $errors->has('contact_name') ? $errors->first('contact_name') : '' }}
						</label>
						<input
							name="contact_name"
							type="text"
							class="form-control"
							placeholder="Name"
							@if(!empty(auth()->guard('user')->id()))
							value="{{ auth()->guard('user')->user()->name }}"
							readonly
							@else
							value="{{ old('contact_name') }}"
							@endif
						>
						<span class="input-group-addon">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('contact_phone') ? 'error' : '' }}">
						<label>
							{{ $errors->has('contact_phone') ? $errors->first('contact_phone') : '' }}
						</label>
						<input
							name="contact_phone"
							type="text"
							class="form-control"
							placeholder="Phone"
							value="{{ old('contact_phone') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('contact_email') ? 'error' : '' }}">
						<label>
							{{ $errors->has('contact_email') ? $errors->first('contact_email') : '' }}
						</label>
						<input
							name="contact_email"
							type="text"
							class="form-control"
							placeholder="Email Address"
							@if(!empty(auth()->guard('user')->id()))
							value="{{ auth()->guard('user')->user()->email }}"
							readonly
							@else
							value="{{ old('contact_email') }}"
							@endif
						>
						<span class="input-group-addon">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('contact_subject') ? 'error' : '' }}">
						<label>
							{{ $errors->has('contact_subject') ? $errors->first('contact_subject') : '' }}
						</label>
						<input
							name="contact_subject"
							type="text"
							class="form-control"
							placeholder="Subject"
							value="{{ old('contact_subject') }}"
						>
						<span class="input-group-addon">
							<i class="fa fa-question" aria-hidden="true"></i>
						</span>
					</div>
					<div class="input-group {{ $errors->has('contact_message') ? 'error' : '' }}">
						<label>
							{{ $errors->has('contact_message') ? $errors->first('contact_message') : '' }}
						</label>
						<textarea
							name="contact_message"
							class="form-control"
							placeholder="Message"
							rows="6"
						>{{ old('contact_message') }}</textarea>
					</div>
					<button>Submit</button>
				</form>
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
