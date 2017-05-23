@extends('backend.layouts.app')

@section('title')
<title>Dashboard</title>
@endsection


@section('breadcrumb')

<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" class="current"><i class="icon-home"></i> Dashboard</a>
  </div>
  <h1>Dashboard</h1>
</div>



@endsection
