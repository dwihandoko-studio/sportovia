@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Reguler Class</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<style type="text/css">
body{
	background-color: rgb(37,37,37);
}
#iad{
	background-image: none;
}
#iad #index-wrapper label a{
	color: rgb(122,122,122);
}
#iad h1:nth-child(even){
    color: rgb(255,255,255);
}
#iad h3{
    color: rgb(196,196,196);
}

#index{
    padding: 40px 0px 0px;
}
#index .index-wrapper{
    position: relative;
    width: 25%;
    height: 73vh;
    padding: 0px .5%;
    margin-bottom: 40px;
    float: left;
}
#index .index-wrapper .img-back{
    width: 100%;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    position: relative;
}
#index .index-wrapper .img-back .img-description-wrapper{
	position: relative;
	padding: 0px 20px;
	top: 62vh;
	width: 100%;
	height: 40vh;
	text-align: center;
	background-image: radial-gradient(circle 50px at 50% 0, transparent 0px, rgba(238,255,233,.8) 0px);
    background-image: -webkit-radial-gradient(50% 0, circle, transparent 0px, rgba(238,255,233,.8) 0px);
    transition: all 1s;
}
#index .index-wrapper .img-back:hover .img-description-wrapper{
	top: 35vh;
	background-image: radial-gradient(circle 50px at 50% 0, transparent 25px, rgba(238,255,233,.8) 25px);
    background-image: -webkit-radial-gradient(50% 0, circle, transparent 25px, rgba(238,255,233,.8) 25px);
}
#index .index-wrapper .img-back .img-description-wrapper:before{
	content: "";
	position: absolute;
	margin: 0 auto;
	background-color: rgba(238,255,233,.8);
	height: 21.5px;
    width: 45px;
    border-radius: 45px 45px 0 0;
    top: -21px;
    margin-left: -23px;
    transition: all .51s;
}
#index .index-wrapper .img-back:hover .img-description-wrapper:before{
	height: 0px;
    width: 0px;
	visibility: hidden;
	opacity: 0;
}
#index .index-wrapper .img-back .img-description-wrapper img{
	visibility: hidden;
	width: 0px;
	height: 0px;
	opacity: 0;
	position: absolute;
    transition: all 1.1s;
}
#index .index-wrapper .img-back:hover .img-description-wrapper img{
	visibility: visible;
	opacity: 1;
	width: 35px;
	height: 35px;
	margin-top: -15px;
	margin-left: -17.5px;
}
#index .index-wrapper .img-back .img-description-wrapper h2{
	padding: 2vh 0px;
	color: rgb(69,186,1);
	font-family: 'open sans';
    font-weight: bold;
    opacity: 1;
    visibility: visible;
    transition: all .51s;
}
#index .index-wrapper .img-back:hover .img-description-wrapper h2{
	opacity: 0;
    visibility: hidden;
}
#index .index-wrapper .img-back .img-description-wrapper p{
	color: rgb(136,137,133);
	font-family: 'open sans';
    font-weight: lighter;
    opacity: 0;
    visibility: hidden;
    transition: all .51s;
}
#index .index-wrapper .img-back:hover .img-description-wrapper p{
	opacity: 1;
    visibility: visible;
    margin-top: -20px;
}
</style>
@endsection

@section('body-content')
<?php // banner wrapper ?>
<div id="banner">
	<div class="banner-content" style="background-image: url('{{ asset('amadeo/main-image/banner.png') }}');"></div>
</div>
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
				<a href="{{ Route($routePage.'index') }}">
					{{ $titlePage }}
				</a>
			</label>
		</div>
		<h1>
			{{ $titlePage }}
		</h1>
		<h1>
			Lorem ipsum dolor sit amet
		</h1>
		<h3>
			Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu
		</h3>
	</div>
</div>
<?php // sport wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
	@for($a=0; $a<=5; $a++)
		<a href="{{ route($routePage.'view', ['slug'=>$a]) }}">
			<div class="index-wrapper">
				<div class="img-back" style="background-image: url('{{ asset('amadeo/main-image/card.jpg') }}');">
					<div class="img-description-wrapper">
						<img src="{{ asset('amadeo/main-image/icon-circle.png') }}">
						<h2>Title In here</h2>
						<p>Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer, Lorem Ipsum Doler Sit Amer,Lorem Ipsum Doler Sit Amer</p>
					</div>
				</div>
			</div>
		</a>
	@endfor
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
