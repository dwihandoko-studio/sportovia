@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-home.css') }}">
@endsection

@section('body-content')
<?php // category card layout wrapper ?>
<div id="cards" class="setup-wrapper">
	<div class="setup-content nor-wd">
		<div class="bar bar-size-4 card">
			<div class="card-wrapper">
				<div class="card-img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}')"></div>
				<div class="screen"></div>
				<div class="card-wrapper-icon">
					<div class="icon-content">
						<div class="icon">
							<img src="{{ asset('amadeo/main-image/icon.png') }}">
						</div>
						<div class="icon">
							<a href="{{ Route('frontend.art.index') }}">
								Art
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bar bar-size-4 card">
			<div class="card-wrapper">
				<div class="card-img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}')"></div>
				<div class="screen"></div>
				<div class="card-wrapper-icon">
					<div class="icon-content">
						<div class="icon">
							<img src="{{ asset('amadeo/main-image/icon.png') }}">
						</div>
						<div class="icon">
							<a href="{{ Route('frontend.sport.index') }}">
								Sport
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bar bar-size-4 card">
			<div class="card-wrapper">
				<div class="card-img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}')"></div>
				<div class="screen"></div>
				<div class="card-wrapper-icon">
					<div class="icon-content">
						<div class="icon">
							<img src="{{ asset('amadeo/main-image/icon.png') }}">
						</div>
						<div class="icon">
							<a href="{{ Route('frontend.education.index') }}">
								Education
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bar bar-size-4 card">
			<div class="card-wrapper">
				<div class="card-img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}')"></div>
				<div class="screen"></div>
				<div class="card-wrapper-icon">
					<div class="icon-content">
						<div class="icon">
							<img src="{{ asset('amadeo/main-image/icon.png') }}">
						</div>
						<div class="icon">
							<a href="{{ Route('frontend.games.index') }}">
								Games
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php // description wrapper ?>
<div id="description" class="setup-wrapper">
	<div class="setup-content lar-wd">
		<div class="text-center">
			<h2><label>Think</label> <label>Smart</label> <label>and</label> <label>Healthy</label> <label>Life</label></h2>
			<p>Lorem ipsum dolor sit amet, sit in aliquip discere. Soluta facilis duo eu. Novum laudem accusamus nam ad, duo nihil iriure malorum an. Vim graeco consequat ex. In vim nusquam percipit antiopam, epicurei officiis mediocritatem ne duo.</p>
			<a class="btn btn-green larg-1" href="">
				Free Trial Class
			</a>
		</div>
	</div>	
</div>
<?php // class wrapper ?>
<div id="class" class="setup-wrapper">
	<div class="setup-content nor-wd">
		<div class="bar bar-size-3">
			<div class="class">
				<div class="class-wrapper">
					<a href="{{ Route('frontend.reguler.index') }}">
						<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg')}}')"></div>
					</a>
					<h2>Reguler Class</h2>
				</div>
			</div>
		</div>
		<div class="bar bar-size-3">
			<div class="class">
				<div class="class-wrapper">
					<a href="{{ Route('frontend.children.index') }}">
						<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg')}}')"></div>
					</a>
					<h2>Children Class</h2>
				</div>
			</div>
		</div>
		<div class="bar bar-size-3">
			<div class="class">
				<div class="class-wrapper">
					<a href="">
						<div class="img" style="background-image: url('{{ asset('amadeo/main-image/card.jpg')}}')"></div>
					</a>
					<h2>Member Area</h2>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
