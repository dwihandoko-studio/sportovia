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

<div id="modal-unpublish" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Unpublish Staff</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure to un publish this staff ?</p>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" id="setUnpublish">Unpublish</a>
    <a data-dismiss="modal" class="btn" href="#">Cancel</a>
  </div>
</div>

<div id="modal-publish" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Publish Staff</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure to publish this staff ?</p>
  </div>
  <div class="modal-footer">
    <a class="btn btn-success" id="setPublish">Publish</a>
    <a data-dismiss="modal" class="btn" href="#">Cancel</a>
  </div>
</div>



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
    <div class="widget-content nopadding"  style="overflow-x:auto;">
      <hr>
      <table class="table table-bordered">
        <thead>
          <th>Action</th>
          <th>Member</th>
          <th>Class Room</th>
          <th>Start</th>
          <th>End</th>
        </thead>
        <tbody>
          @foreach ($getJadwal as $jadwal)
          @if ($jadwal->hari == $key)
          <tr>
            <td>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Act <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li>@if ($jadwal->flag_status == 1)
                    <a href="" class="unpublish" data-value="{{ $jadwal->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Active"><i class="icon icon-thumbs-up"></i>Active</span></a>
                  @else
                    <a href="" class="publish" data-value="{{ $jadwal->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Deactivate"><i class="icon icon-thumbs-down"></i>Deactivate</span></a>
                  @endif</li>
                  <li><a href="{{ route('jadwal.ubah.schedule', ['id' => $jadwal->id]) }}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></li>
                </ul>
              </div>
            </td>
            <td>{{ $jadwal->member->kode_member }} | {{ $jadwal->member->nama_member }}</td>
            <td>{{ $jadwal->kelasRuang->nama_kelas }}</td>
            <td>{{ $jadwal->jam_mulai}}</td>
            <td>{{ $jadwal->jam_akhir}}</td>
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
<script type="text/javascript">
$(function(){
  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/schedule/status/"+a);
  });

  $('a.publish').click(function(){
      var a = $(this).data('value');
      $('#setPublish').attr('href', "{{ url('/') }}/admin/schedule/status/"+a);
    });
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
