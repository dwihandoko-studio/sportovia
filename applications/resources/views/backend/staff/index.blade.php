@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Staff</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('pegawai.index') }}" class="current">Staff List</a>
  </div>
  <h1>Staff List</h1>
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
    <h5>Staff List</h5>
    <a href="{{ route('pegawai.tambah') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
  <div class="widget-content nopadding">
    <table class="table table-bordered jabatan-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Position</th>
          <th>Quotes</th>
          <th>Avatar</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getStaff as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->nama_staff }}</td>
          <td>{{ $key->nama_jabatan }}</td>
          <td>{{ $key->quotes_staff }}</td>
          <td><img src="{{ asset('amadeo/images/users').'/'.$key->avatar }}" alt=""></td>
          <td>@if ($key->flag_publish == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
          <td><a href="{{ route('pegawai.edit').'/'.$key->id }}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
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
  $('.jabatan-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 50,
  });

  $("#basic_validate").validate({
    rules:{
      nama_jabatan:{
        required:true
      }
    },
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    }
  });
</script>

<script type="text/javascript">
$(function(){
  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/staff/publish/"+a);
  });

  $('a.publish').click(function(){
      var a = $(this).data('value');
      $('#setPublish').attr('href', "{{ url('/') }}/admin/staff/publish/"+a);
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
