@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Facility</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('fasilitas.index') }}" class="current">Facility</a>
  </div>
  <h1>Facility</h1>
</div>
@endsection

@section('content')
  <div id="addFasilitas" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Add Facility</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post" action="{{ route('fasilitas.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group {{ $errors->has('nama_fasilitas') ? 'error' : ''}}">
          <label class="control-label">Facility Name</label>
          <div class="controls">
            <input type="text" name="nama_fasilitas" class="span9" id="nama_fasilitas" value="{{ old('nama_fasilitas') }}">
            @if($errors->has('nama_fasilitas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('nama_fasilitas')}}</strong>
    				</span>
  			  @endif
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input type="submit" value="Submit" class="btn btn-success">
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
    </form>
  </div>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Facility</h5>
    <a href="#addFasilitas" data-toggle="modal" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
  <div class="widget-content">
    <table class="table table-bordered fasilitas-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Facility</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getFasilitas as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->nama_fasilitas }}</td>
          <td>@if ($key->flag_publish == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-unpublish"><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
          <td><a href="#"><i class="icon icon-pencil"></i> Edit</a></td>
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
  $('.fasilitas-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>'
  });

  $("#basic_validate").validate({
    rules:{
      nama_fasilitas:{
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

@if($errors->has('nama_fasilitas'))
<script type="text/javascript">
  $('#addFasilitas').modal('show');
</script>
@endif

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
