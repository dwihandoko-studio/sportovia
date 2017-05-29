@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - Children Class</title>
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
	background-image: url('amadeo/main-image/children-bg.png');
	background-size: contain;
	background-repeat: repeat-y;
	background-position: center;
}
#iad{
	background-image: none;
}
#iad #index-wrapper label a{
	color: rgb(122,122,122);
}
#iad h1:nth-child(even){
    color: rgb(82,81,81);
}
#iad h3{
    color: rgb(82,81,81);
}

#footer{
	background-color: rgb(163,219,221);
	margin-top: 65px;
}
#footer:before{
	content: "";
	position: absolute;
	width: 100%;
	height: 10vh;
	top: -65px;
	background-image: url('amadeo/main-image/children-ft.png');
}
#footer .footer-wrapper .footer-content .fa-stack-1x{
	color: rgb(163,219,221);
}

#index{
	padding-bottom: 65px;
}
#index .index-wrapper{
    position: relative;
    width: 25%;
    height: 73vh;
    padding: 0px .5%;
    margin-bottom: 40px;
    float: left;
    overflow: hidden;
}
#index .index-wrapper .img-back{
    width: 100%;
    height: 73vh;
    text-align: center;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    position: relative;
    transition: all .51s;
}
#index .index-wrapper .img-back h2{
	color: rgb(69,186,1);
	font-family: 'open sans';
    font-weight: bold;
    padding: 10px 0px;
}
#index .index-wrapper .img-back .content{
	text-align: center;
    width: 70%;
    margin-left: 50px;
    margin-top: 50px;
    padding: 0px 10px;
}
#index .index-wrapper .img-back .content p{
	font-family: 'open sans';
    font-weight: lighter;
    color: rgb(122,122,122);
}
#index .index-wrapper .img-back.pict{
    visibility: visible;
    opacity: 1;
}
#index .index-wrapper:hover .img-back.pict{
	visibility: hidden;
    opacity: 0;
    height: 0vh;
}
#index .index-wrapper .img-back.default{
    visibility: hidden;
    opacity: 0;
}
#index .index-wrapper:hover .img-back.default{
	visibility: visible;
    opacity: 1;
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
<?php // index wrapper ?>
<div id="index" class="setup-wrapper">
	<div class="setup-content lar-wd">
	@for($a=0; $a<=5; $a++)
		<div class="index-wrapper">
			<div class="img-back pict" style="background-image: url('{{ asset('amadeo/main-image/kids-index-pict.png') }}');">
				<h2>Title In Here</h2>
			</div>
			<div class="img-back default" style="background-image: url('{{ asset('amadeo/main-image/kids-index.png') }}');">
				<h2>Title In Here</h2>
				<div class="content">
					<p>	Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
					<a href="{{ route($routePage.'view', ['slug'=>$a]) }}" class="btn btn-green">Detail</a>
				</div>
			</div>
		</div>
	@endfor
		<div class="clearfix"></div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
