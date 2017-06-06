@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Social Media</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('socmed.tambah') }}" class="current">Add Social Media</a>
  </div>
  <h1>Add Social Media</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Social Media</h5>
      <a href="{{ route('socmed.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('socmed.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group {{ $errors->has('nama_sosmed') ? 'error' : ''}}">
        <label class="control-label">Social Media Name *</label>
        <div class="controls">
          <select class="span6" name="nama_sosmed">
            <option value="instagram" {{ old('nama_sosmed') == 'instagram' ? 'selected' : '' }}>Instagram</option>
            <option value="facebook" {{ old('nama_sosmed') == 'facebook' ? 'selected' : '' }}>Facebook</option>
            <option value="youtube" {{ old('nama_sosmed') == 'youtube' ? 'selected' : '' }}>Youtube</option>
            <option value="twitter" {{ old('nama_sosmed') == 'twitter' ? 'selected' : '' }}>Twitter</option>
            <option value="g+" {{ old('nama_sosmed') == 'g+' ? 'selected' : '' }}>G+</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Url Link *</label>
        <div class="controls">
          <input type="text" name="link_url" class="span6" id="link_url" value="{{ old('link_url') }}">
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
      nama_sosmed:{
        required:true,
      },
      img_url:{
        required:true,
        accept:"png|jpe?g"
      },
      link_url:{
        required:true,
        url: true
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
