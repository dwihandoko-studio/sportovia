@extends('backend.layouts.app')

@section('title')
<title>Sportopia | News</title>
@endsection

@section('head.script')
<link rel="stylesheet" href="{{ asset('backend/css/datepicker.css') }}" />
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('news.index') }}">News</a>
    <a href="" class="current">Add News</a>
  </div>
  <h1>Add News</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add News</h5>
      <a href="{{ route('news.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('news.edit') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $get->id }}">
      <div class="control-group {{ $errors->has('judul') ? 'error' : '' }}">
        <label class="control-label">Title *</label>
        <div class="controls">
          <input type="text" name="judul" class="span6" id="judul" value="{{ old('judul', $get->judul) }}" maxlength="25" />
        </div>
      </div>
      <div class="control-group {{ $errors->has('deskripsi') ? 'error' : '' }}">
        <label class="control-label">Content *</label>
        <div class="controls">
          <textarea name="deskripsi" class="span6" id="deskripsi" cols="20" rows="20" maxlength="900">{{ old('deskripsi', preg_replace('#<br\s*/?>#i', "\n", $get->deskripsi)) }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_banner') ? 'error' : '' }}">
        <label class="control-label">Main Image</label>
        <div class="controls">
          <span class="help-block">Empty if don't change; Width: 1020px; Height: 510px</span>
        </div>
        <div class="controls">
          <input name="img_banner" class="span6" id="img_banner" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_banner'))
          <span for="img_banner" generated="true" class="help-inline">{{ $errors->first('img_banner') }}</span>
          @endif
        </div>
        <div class="controls">
          <img src="{{ asset('amadeo/images/news-event').'/'.$get->img_banner }}" alt="">
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_thumb') ? 'error' : '' }}">
        <label class="control-label">Thumbnail Image</label>
        <div class="controls">
          <span class="help-block">Empty if don't change; Width: 350px; Height: 200px</span>
        </div>
        <div class="controls">
          <input name="img_thumb" class="span6" id="img_thumb" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_thumb'))
          <span for="img_thumb" generated="true" class="help-inline">{{ $errors->first('img_thumb') }}</span>
          @endif
        </div>
        <div class="controls">
          <img src="{{ asset('amadeo/images/news-event').'/'.$get->img_thumb }}" alt="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Publish Date</label>
        <div class="controls">
          <div data-date="{{ date('Y-m-d') }}" class="input-append date datepicker">
            <input type="text" name="tanggal_publish "value="{{ old('tanggal_publish', $get->tanggal_publish) }}" data-date-format="yyyy-mm-dd" class="span9" readonly="">
            <span class="add-on"><i class="icon-th"></i></span> </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Publish</label>
        <div class="controls">
          <label>
            <input type="checkbox" name="flag_publish" class="span6" {{ ($get->flag_publish == 1) ? 'checked=""' : ''}} />
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
<script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
  });
  $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
  $("#basic_validate").validate({
    ignore: [],
    rules:{
      judul:{
        required:true,
        maxlength:25
      },
      deskripsi:{
        required:true,
        maxlength:900
      },
      img_banner:{
        accept:"png|jpe?g"
      },
      img_thumb:{
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
