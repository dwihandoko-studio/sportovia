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
    <a href="{{ route('jadwal.index') }}" class="btn btn-inverse pull-right">  Back</a>&nbsp;
    <a href="{{ route('jadwal.class', ['id' => $getKelas->id ]) }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add Student</a>
  </div>
  <div class="widget-content">
    <table class="table">
      <thead>
        <th><label class="control-label"><b>{{$getKelas->kelasKategori->kategori_kelas}}</b></label></th>
        <th><label class="control-label"><b>{{$getKelas->nama_kelas}}</b></label></th>
        <th><label class="control-label"><b>{{$getKelas->kelasProgram->program_kelas}}</b></label></th>
      </thead>
    </table>
  </div>
</div>

@foreach (array_chunk($getDay, 3) as $days)
<div class="row-fluid">
@foreach ($days as $key)
<div class="span4">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
      <h5>{{ $key }}</h5>
    </div>
    <div class="widget-content"  style="overflow-x:auto;">
      <table class="table table-bordered">
        <thead>
          <th>Member</th>
          <th>Start</th>
          <th>End</th>
          <th>Action</th>
        </thead>
        <tbody>
          @foreach ($getJadwal as $jadwal)
          @if ($jadwal->hari == $key)
          <tr>
            <td>{{ $jadwal->member->kode_member }} | {{ $jadwal->member->nama_member }}</td>
            <td>{{ $jadwal->jam_mulai}}</td>
            <td>{{ $jadwal->jam_akhir}}</td>
            <td>{{ $jadwal->id}}</td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endforeach
</div>
@endforeach

@endsection

@section('script')
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
