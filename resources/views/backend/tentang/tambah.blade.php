@extends('backend.layouts.app')

@section('title')
<title>Sportopia | About</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('tentang.index') }}">About</a>
    <a href="" class="current">Add About</a>
  </div>
  <h1>Add About</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add About</h5>
      <a href="{{ route('tentang.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('tentang.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group">
        <label class="control-label">Descriptions *</label>
        <div class="controls">
          <textarea name="deskripsi_tentang" class="span9" id="deskripsi_tentang" maxlength="350">{{ old('deskripsi_tentang') }}</textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Image for Vision *</label>
        <div class="controls">
          <input name="img_visi" class="span9" id="img_visi" type="file"  accept=".jpg, .png" maxlength="350"/>
          <span>Width: 100px; Height: 100px</span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Vision *</label>
        <div class="controls">
          <textarea name="visi" class="span9" id="visi">{{ old('visi') }}</textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Image for Mission *</label>
        <div class="controls">
          <input name="img_misi" class="span9" id="img_misi" type="file" accept=".jpg, .png"/>
          <span>Width: 100px; Height: 100px</span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Mission *</label>
        <div class="controls">
          <textarea name="misi" class="span9" id="misi">{{ old('misi') }}</textarea>
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
    rules:{
      deskripsi_tentang:{
        required:true,
        maxlength:350,
      },
      img_visi:{
        required:true,
        accept:"png|jpe?g"
      },
      visi:{
        required:true
      },
      img_misi:{
        required:true,
        accept:"png|jpe?g"
      },
      misi:{
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
@endsection
