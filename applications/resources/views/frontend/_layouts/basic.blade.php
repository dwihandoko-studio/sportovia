<!DOCTYPE html>
<html>
<head>

	@yield('head-title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="all" />


    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('amadeo/font/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/frontend-publict.css') }}">
    @yield('head-style')

	<link rel="icon" type="image/png" href="{{ asset('amadeo/main-image/sportopia-logo-color.png') }}" />
	<link rel="image_src" href="" />

</head>
<body>
	
	@include('frontend._include.navigasi-bar')	
	@yield('body-content')
	@include('frontend._include.footer')	
	<script type="text/javascript" src="{{ asset('plugin/jquery/jquery-3.2.0.min.js') }}"></script>
	@yield('footer-script')

</body>
</html>
