@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Social Media</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('socmed.index') }}">Social Media</a>
    <a href="" class="current">Social Media</a>
  </div>
  <h1>Edit Social Media</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Edit Social Media</h5>
      <a href="{{ route('socmed.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('socmed.edit') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group">
        <label class="control-label">Social Media Name *</label>
        <div class="controls">
          <input type="hidden" name="id" value="{{ $getSocmed->id}}">
          <input type="text" class="span6" name="nama_sosmed" value="{{ old('nama_sosmed', $getSocmed->nama_sosmed)}}" id="nama_sosmed">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Url Link *</label>
        <div class="controls">
          <input type="text" name="link_url" class="span6" id="link_url" value="{{ old('link_url', $getSocmed->link_url) }}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Social Media Image </label>
        <div class="controls">
          <input name="img_url" class="span6" id="img_url" type="file"  accept=".jpg, .png"/>
          <span>Width: 100px; Height: 100px</span>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <img src="{{ asset('amadeo/images/social').'/'.$getSocmed->img_url }}" alt="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Publish</label>
        <div class="controls">
          <label>
            <input type="checkbox" name="flag_publish" class="span6" {{ ($getSocmed->flag_publish == 1) ? 'checked' : '' }}/>
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
