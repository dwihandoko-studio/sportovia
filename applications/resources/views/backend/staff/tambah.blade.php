@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Trainer</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('pegawai.index') }}">Trainer List</a>
    <a href="{{ route('pegawai.tambah') }}" class="current">Add Trainer</a>
  </div>
  <h1>Add Trainer</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Trainer</h5>
      <a href="{{ route('pegawai.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('pegawai.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group">
        <label class="control-label">Name *</label>
        <div class="controls">
          <input type="text" class="span6" name="nama_staff" value="{{ old('nama_staff')}}" id="nama_staff">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Position *</label>
        <div class="controls">
          <select class="span6" name="id_jabatan" id="id_jabatan" title="Please select.">
            <option value="" selected="">--Choose--</option>
            @foreach ($getJabatan as $key)
            <option value="{{ $key->id}}">{{ $key->nama_jabatan }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Quotes</label>
        <div class="controls">
          <textarea name="quotes_staff" class="span6" id="quotes_staff">{{ old('quotes_staff') }}</textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Avatar</label>
        <div class="controls">
          <input name="avatar" class="span6" id="avatar" type="file"  accept=".jpg, .png"/>
          <span>Width: 100px; Height: 100px</span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Publish</label>
        <div class="controls">
          <label>
            <input type="checkbox" name="flag_publish" class="span6" checked=""/>
          </label>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" value="Submit" class="btn btn-success">
      </div>
    </form>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
  $("#basic_validate").validate({
    ignore: [],
    rules:{
      nama_staff:{
        required:true,
      },
      id_jabatan:{
        required:true,
      },
      avatar:{
        accept:"png|jpe?g"
      },
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
@endsection
