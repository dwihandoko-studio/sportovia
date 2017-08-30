@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Category</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasKategori.index') }}">Class Category</a>
    <a href="" class="current">Add Class Category</a>
  </div>
  <h1>Add Class Category</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Class Category</h5>
      <a href="{{ route('kelasKategori.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('kelasKategori.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group {{ $errors->has('kategori_kelas') ? 'error' : '' }}">
        <label class="control-label">Class Category *</label>
        <div class="controls">
          <input type="text" class="span6" name="kategori_kelas" value="{{ old('kategori_kelas')}}" id="kategori_kelas">
        </div>
      </div>
      <div class="control-group {{ $errors->has('quotes_kategori') ? 'error' : '' }}">
        <label class="control-label">Quotes Category *</label>
        <div class="controls">
          <textarea name="quotes_kategori" class="span6" id="quotes_kategori">{{ old('quotes_kategori') }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('deskripsi_kategori') ? 'error' : '' }}">
        <label class="control-label">Description Category *</label>
        <div class="controls">
          <textarea name="deskripsi_kategori" class="span6" id="deskripsi_kategori">{{ old('deskripsi_kategori') }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_banner') ? 'error' : '' }}">
        <label class="control-label">Image Banner *</label>
        <div class="controls">
          <span>Width: 1350px; Height: 356px</span>
        </div>
        <div class="controls">
          <input name="img_banner" class="span6" id="img_banner" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_banner'))
          <span for="img_banner" generated="true" class="help-inline">{{ $errors->first('img_banner') }}</span>
          @endif
          <span>Width: 1350px; Height: 356px</span>
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_thumb') ? 'error' : '' }}">
        <label class="control-label">Image Thumbnail *</label>
        <div class="controls">
          <span>Width: 228px; Height: 437px</span>
        </div>
        <div class="controls">
          <input name="img_thumb" class="span6" id="img_thumb" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_thumb'))
          <span for="img_thumb" generated="true" class="help-inline">{{ $errors->first('img_thumb') }}</span>
          @endif
          <span>Width: 228px; Height: 437px</span>
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
      kategori_kelas:{
        required:true,
      },
      quotes_kategori:{
        required:true,
      },
      deskripsi_kategori:{
        required:true,
      },
      img_banner:{
        required:true,
        accept:"png|jpe?g"
      },
      img_thumb:{
        required:true,
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
