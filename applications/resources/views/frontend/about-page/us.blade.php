@extends('frontend._layouts.basic')

@section('head-title')
<title>Sportopia - About Us</title>
@endsection

@section('meta')
<meta name="title" content="Sportopia">
<meta name="description" content="Sportopia - ">
<meta name="keywords" content="Sportopia " />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict-sub.css') }}">
<style type="text/css">
#vam-wrapper{
	padding-top: 20px;
	padding-bottom: 60px;
}
#vam-wrapper .vam-content{
	position: relative;
	width: 100%;
}
#vam-wrapper .bar:nth-child(odd) .vam-content{
	text-align: left;
}
#vam-wrapper .bar:nth-child(even) .vam-content{
	margin-top: 20vh;
	text-align: right;
}
#vam-wrapper .vam-content img{
	width: auto; 
	height: 90vh;
}
#vam-wrapper .vam-content .vam-descript-wrapper{
	position: absolute;
	z-index: 2;
	padding: 0px 10px;
	width: 40vw;
	height: 25vh;
	background-color: rgba(233,255,226,.8);
}
#vam-wrapper .bar:nth-child(odd) .vam-content .vam-descript-wrapper{
	left: 10vw;
	top: 30vh;
}
#vam-wrapper .bar:nth-child(even) .vam-content .vam-descript-wrapper{
	left: -15vw;
	top: 55vh;
}
#vam-wrapper .vam-content .vam-descript-wrapper .bar{
	display: table;
	height: 25vh;
}
#vam-wrapper .vam-content .vam-descript-wrapper .bar .midle{
	display: table-cell;
	height: 25vh;
	vertical-align: middle;
}
#vam-wrapper .vam-content .vam-descript-wrapper .bar .midle h2{
	text-align: center;
	font-family: 'open sans';
    font-weight: bold;
    font-style: italic;
    color: rgb(69,186,1);
}
#vam-wrapper .vam-content .vam-descript-wrapper .bar .midle p{
	text-align: left;
	text-indent: 30px;
	font-family: 'open sans';
    font-weight: lighter;
    color: rgb(136,137,133);
}
#vam-wrapper .vam-content .vam-descript-wrapper .bar .midle h2,
#vam-wrapper .vam-content .vam-descript-wrapper .bar .midle p{
	margin: 0px;
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
			@for($a=0; $a<=2; $a++)
			<label>
				<a href="">
					index
				</a>
			</label>
			@endfor
		</div>
		<h2>About Us</h2>
		<div id="description-wrapper">
			<p>Lorem ipsum dolor sit amet, quas assum volutpat ei vix, usu semper laoreet placerat an. Assum recteque te has, ad quidam euripidis eloquentiam sed, equidem fierent phaedrum et sea. An legendos praesent quo. Sea cu dicta partem signiferumque.</p>
		</div>
	</div>
</div>
<?php // visi and misi wrapper ?>
<div id="vam-wrapper" class="setup-wrapper">
	<div class="setup-content nor-wd">
		<div class="bar bar-size-2">
			<div class="vam-content">
				<img src="{{ asset('amadeo/main-image/card.jpg') }}">
				<div class="vam-descript-wrapper">
					<div class="bar bar-size-4">
						<div class="midle">
							<h2>Visi</h2>
						</div>
					</div>
					<div class="bar bar-size-1">
						<div class="midle">
							<p>Lorem ipsum dolor sit amet, esse possit splendide at mea, autem probatus mea eu. Erat summo sonet ius et, dicant atomorum an pro. Duo ut mazim munere aliquip. Ancillae percipitur ne ius, assum eruditi per cu. Dictas aperiri epicurei no nam, tibique intellegebat vim ne.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="bar bar-size-2">
			<div class="vam-content">
				<img src="{{ asset('amadeo/main-image/card.jpg') }}">
				<div class="vam-descript-wrapper">
					<div class="bar bar-size-4">
						<div class="midle">
							<h2>Misi</h2>
						</div>
					</div>
					<div class="bar bar-size-1">
						<div class="midle">
							<p>Lorem ipsum dolor sit amet, esse possit splendide at mea, autem probatus mea eu. Erat summo sonet ius et, dicant atomorum an pro. Duo ut mazim munere aliquip. Ancillae percipitur ne ius, assum eruditi per cu. Dictas aperiri epicurei no nam, tibique intellegebat vim ne.</p>
						</div>
					</div>
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
