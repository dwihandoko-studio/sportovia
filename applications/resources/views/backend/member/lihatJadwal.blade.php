@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Member Shcedule</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('member.index') }}" >Member</a>
    <a href="" class="current">Member Shcedule</a>
  </div>
  <h1>Member Shcedule</h1>
</div>
@endsection

@section('content')

<div id="modal-unpublish" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Deactivated Schedule</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure to deactivated this schedule ?</p>
  </div>
  <div class="modal-footer">
    <a class="btn btn-danger" id="setUnpublish">Deactivated</a>
    <a data-dismiss="modal" class="btn" href="#">Cancel</a>
  </div>
</div>

<div id="modal-publish" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Activated Schedule</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure to activated this schedule ?</p>
  </div>
  <div class="modal-footer">
    <a class="btn btn-success" id="setPublish">Activated</a>
    <a data-dismiss="modal" class="btn" href="#">Cancel</a>
  </div>
</div>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    @if (!$getJadwal->isEmpty())
      <h5>Member Shcedule</h5><h5>{{ $getJadwal[0]->member->kode_member}} / {{ $getJadwal[0]->member->nama_member}}</h5>
    @else
      <h5>Member Shcedule</h5>
    @endif
    <a href="{{ route('member.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    <a href="{{ route('jadwal.classMember') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add Schedule</a>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered member-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Class</th>
          <th>Class Room</th>
          <th>Day</th>
          <th>Start</th>
          <th>End</th>
          <th>Document Report</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getJadwal as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->kelas->nama_kelas }}</td>
          <td>{{ $key->kelasRuang->nama_kelas }}</td>
          <td>{{ $key->hari }}</td>
          <td>{{ $key->jam_mulai }}</td>
          <td>{{ $key->jam_akhir }}</td>
          <td>@if ($key->dokumen_rapot)
            <a href="{{ asset('amadeo/documents').'/'.$key->dokumen_rapot }}" target="_blank">Download</a>
          @else
            -
          @endif</td>
          {{-- <td>{!! ($key->flag_status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-important">Inactive</span>' !!}</td> --}}
          <td>@if ($key->flag_status == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Active"><i class="icon icon-thumbs-up"></i> Active</span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Deactivate"><i class="icon icon-thumbs-down"></i> Inactive</span></a>
          @endif</td>
          <td>
            <a href="{{ route('jadwal.ubah.schedule', ['id' => $key->id])}}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
        </tr>
        @php
          $no++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  $('.member-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 100
  });
</script>

<script type="text/javascript">
$(function(){
  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/member/shcedule/status/"+a);
  });

  $('a.publish').click(function(){
      var a = $(this).data('value');
      $('#setPublish').attr('href', "{{ url('/') }}/admin/member/shcedule/status/"+a);
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
