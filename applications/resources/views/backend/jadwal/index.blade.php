@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Schedule</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('jadwal.index') }}" class="current">Schedule</a>
  </div>
  <h1>Schedule</h1>
</div>
@endsection

@section('content')

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Schedule</h5>
    <a href="" data-toggle="modal" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
</div>

<div class="row-fluid">
@foreach ($getKelas as $key)
<div class="span4">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
      <h5>{{ $key->nama_kelas}}</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table">
        <tbody>
          <tr>
            <td><b>Class Category</b></td>
            <td>&nbsp;</td>
            <td>{!! $key->kelasKategori->kategori_kelas !!}</td>
          </tr>
          <tr>
            <td><b>Class Program</b></td>
            <td>&nbsp;</td>
            <td>{!! $key->kelasProgram->program_kelas !!}</td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td>&nbsp;</td>
            <td>{!! $key->deskripsi_kelas !!}</td>
          </tr>
          <tr>
            <td><b>Quotes</b></td>
            <td>&nbsp;</td>
            <td>{!! $key->quotes !!}</td>
          </tr>
          <tr>
            <td><b>Facility</b></td>
            <td>&nbsp;</td>
            <td>{!! $key->fasilitas !!}</td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:center"><a href="{{ route('jadwal.seeSchedule', ['id' => $key->id ]) }}" class="btn btn-primary"><i class="icon-plus"></i> See Schedule</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endforeach
</div>


@endsection

@section('script')
<script type="text/javascript">
  $('.fasilitas-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 100
  });
</script>

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
