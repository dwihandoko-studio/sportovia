@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Contact</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kontak.index') }}" class="current">Contact</a>
  </div>
  <h1>Contact</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Contact</h5>
    @if($getKontak->isEmpty())
    <a href="{{ route('kontak.tambah') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
    @else
    <a href="{{ route('kontak.ubah', array('id' => $getKontak[0]->id )) }}" class="btn btn-warning pull-right"><i class="icon-plus"></i> Edit</a>
    @endif
  </div>
  <div class="widget-content">

  </div>
</div>


@endsection

@section('script')
{{-- <script type="text/javascript">
  $('.contact-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>'
  });
</script> --}}

@if(Session::has('berhasil'))
<script type="text/javascript">
  $.gritter.add({
    title:	'Success',
    text:	'{{ Session::get('berhasil') }}',
    sticky: false
  });
</script>
@endif
@endsection
