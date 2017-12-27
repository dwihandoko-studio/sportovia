@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Course</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasKursus.index') }}">Class Course</a>
    <a href="" class="current">Add Class Course</a>
  </div>
  <h1>Add Class Course</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Class Course</h5>
      <a href="{{ route('kelasKursus.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('kelasKursus.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group {{ $errors->has('id_kategori_kelas') ? 'error' : '' }}">
        <label class="control-label">Class Category *</label>
        <div class="controls">
          <select class="span6" name="id_kelas_kategori" id="id_kelas_kategori" title="Please select.">
            <option value="" selected="">--Choose--</option>
            @foreach ($getKelasKategori as $key)
            <option value="{{ $key->id }}" {{ old('id_kelas_kategori') == $key->id ? 'selected="selected"' : '' }}>{{ $key->kategori_kelas }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('id_program') ? 'error' : '' }}">
        <label class="control-label">Program *</label>
        <div class="controls">
          <select class="span6" name="id_program" id="id_program" title="Please select.">
            <option value="" selected="">--Choose--</option>
            @foreach ($getKelasProgram as $key)
            <option value="{{ $key->id }}" {{ old('id_program') == $key->id ? 'selected="selected"' : '' }}>{{ $key->program_kelas }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('nama_kelas') ? 'error' : '' }}">
        <label class="control-label">Name Class *</label>
        <div class="controls">
          <input type="text" name="nama_kelas" class="span6" id="nama_kelas" value="{{ old('nama_kelas') }}" maxlength="25" />
        </div>
      </div>
      <div class="control-group {{ $errors->has('quotes') ? 'error' : '' }}">
        <label class="control-label">Quotes *</label>
        <div class="controls">
          <input type="text" name="quotes" class="span6" id="quotes" value="{{ old('quotes') }}" maxlength="75" />
        </div>
      </div>
      <div class="control-group {{ $errors->has('deskripsi_kelas') ? 'error' : '' }}">
        <label class="control-label">Description Class *</label>
        <div class="controls">
          <textarea name="deskripsi_kelas" class="span6" id="deskripsi_kelas" <?php //maxlength="250" ?> >{{ old('deskripsi_kelas') }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_url_landscape') ? 'error' : '' }}">
        <label class="control-label">Image Landscape *</label>
        <div class="controls">
          <span>Width: 550px; Height: 400px</span>
        </div>
        <div class="controls">
          <input name="img_url_landscape" class="span6" id="img_url_landscape" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_url_landscape'))
          <span for="img_url_landscape" generated="true" class="help-inline">{{ $errors->first('img_url_landscape') }}</span>
          @endif
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_url') ? 'error' : '' }}">
        <label class="control-label">Image Portrait *</label>
        <div class="controls">
          <span>Width: 275px; Height: 500px</span>
        </div>
        <div class="controls">
          <input name="img_url" class="span6" id="img_url" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_url'))
          <span for="img_url" generated="true" class="help-inline">{{ $errors->first('img_url') }}</span>
          @endif
        </div>
      </div>
      {{-- <div class="control-group {{ $errors->has('fasilitas') ? 'error' : '' }}">
        <label class="control-label">Facility *</label>
        <div class="controls">
          <select class="span6" name="fasilitas[]" id="fasilitas" title="Please select." multiple="">
            @foreach ($getFasilitas as $key)
            <option value="{{ $key->nama_fasilitas }}" {{ (collect(old('fasilitas'))->contains($key->nama_fasilitas)) ? 'selected':'' }}>{{ $key->nama_fasilitas }}</option>
            @endforeach
          </select>
        </div>
      </div> --}}
      <div class="control-group {{ $errors->has('video_url') ? 'error' : '' }}">
        <label class="control-label">Video Url</label>
        <div class="controls">
          <input type="text" name="video_url" class="span6" id="video_url" value="{{ old('video_url') }}" placeholder="Eg: https://www.youtube.com/watch?v=aPdNFMN1unU" />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Homepage Slider</label>
        <div class="controls">
          <label>
            <input type="checkbox" name="flag_homepage" class="span6"/>
          </label>
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
      id_kelas_kategori:{
        required:true,
      },
      id_program:{
        required:true,
      },
      nama_kelas:{
        required:true,
        maxlength:25,
      },
      quotes:{
        required:true,
        maxlength:75
      },
      deskripsi_kelas:{
        required:true,
        // maxlength:250
      },
      img_url:{
        required:true,
        accept:"png|jpe?g"
      },
      img_url_landscape:{
        required:true,
        accept:"png|jpe?g"
      },
      // fasilitas:{
      //   required:true,
      // },
      video:{
        url:true,
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
