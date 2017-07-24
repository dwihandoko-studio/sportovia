@extends('backend.layouts.app')

@section('title')
<title>Sportopia | 404 Not Found</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Error</a>
  </div>
  <h1>404 Not Found</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
    <h5>Error 404</h5>
  </div>
  <div class="widget-content">
    <div class="error_ex">
      <h1>404</h1>
      <h3>Opps, You're lost.</h3>
      <p>We can not find the page you're looking for.</p>
      <a class="btn btn-warning btn-big"  href="{{ redirect()->back()->getTargetUrl() }}">Back</a> </div>
  </div>
</div>


@endsection
