@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Member</title>
@endsection

@section('head.script')
<link rel="stylesheet" href="{{ asset('backend/css/datepicker.css') }}" />
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('member.index') }}">Member</a>
    <a href="" class="current">Add Member</a>
  </div>
  <h1>Add Member</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Member</h5>
      <a href="{{ route('member.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('member.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="control-group {{ $errors->has('kode_member') ? 'error' : '' }}">
        <label class="control-label">Member Code *</label>
        <div class="controls">
          <input type="text" class="span6" name="kode_member" readonly="" value="{{ $kode_member }}">
        </div>
      </div>
      <div class="control-group {{ $errors->has('id_program') ? 'error' : '' }}">
        <label class="control-label">Member Account *</label>
        <div class="controls">
          <select class="span6" name="id_program" id="id_program">
            <option value="1" {{ old('id_program') == '1' ? 'selected' : '' }}>Regular</option>
            <option value="2" {{ old('id_program') == '2' ? 'selected' : '' }}>Kids</option>
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('anak_member') ? 'error' : '' }}" id="anak_member_nya">
        <label class="control-label">Parents *</label>
        <div class="controls">
          <select class="span6" name="anak_member" id="anak_member">
            <option value="">--Choose--</option>
            @foreach ($getOrangTua as $key)
              <option value="{{ $key->id }}" {{ old('anak_member') == $key->id ? 'selected' : '' }}>{{ $key->kode_member}} | {{ $key->nama_member }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('email') ? 'error' : '' }}" id="emailnya">
        <label class="control-label">Email *</label>
        <div class="controls">
          <input type="text" name="email" value="{{ old('email') }}" class="span6" id="email">
        </div>
      </div>
      <div class="control-group {{ $errors->has('nama_member') ? 'error' : '' }}">
        <label class="control-label">Name *</label>
        <div class="controls">
          <input type="text" name="nama_member" value="{{ old('nama_member') }}" class="span6" id="nama_member">
        </div>
      </div>
      <div class="control-group {{ $errors->has('tempat_lahir') ? 'error' : '' }}">
        <label class="control-label">Birth Place *</label>
        <div class="controls">
          <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="span6" id="tempat_lahir">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Birth Date</label>
        <div class="controls">
          <div data-date="{{ date('Y-m-d') }}" class="input-append date tanggal_lahir">
            <input type="text" name="tanggal_lahir" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" class="span9" readonly="">
            <span class="add-on"><i class="icon-th"></i></span> </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Join Date</label>
        <div class="controls">
          <div data-date="{{ date('Y-m-d') }}" class="input-append date tanggal_gabung">
            <input type="text" name="tanggal_gabung" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" class="span9" readonly="">
            <span class="add-on"><i class="icon-th"></i></span> </div>
        </div>
      </div>
      <div class="control-group {{ $errors->has('alamat') ? 'error' : '' }}">
        <label class="control-label">Address *</label>
        <div class="controls">
          <textarea name="alamat" class="span6" id="alamat" cols="8" rows="8">{{ old('alamat') }}</textarea>
        </div>
      </div>
      <div class="control-group {{ $errors->has('img_member') ? 'error' : '' }}">
        <label class="control-label">Image *</label>
        <div class="controls">
          <span>Width: 250px; Height: 250px</span>
        </div>
        <div class="controls">
          <input name="img_member" class="span6" id="img_member" type="file"  accept=".jpg, .png"/>
          @if($errors->has('img_member'))
          <span for="img_member" generated="true" class="help-inline">{{ $errors->first('img_member') }}</span>
          @endif
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
  $('#emailnya').show();
  $('#anak_member_nya').hide();
  $('.tanggal_lahir').datepicker({
    format: 'yyyy-mm-dd',
  });
  $('.tanggal_gabung').datepicker({
    format: 'yyyy-mm-dd',
  });
  $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
  $("#basic_validate").validate({
    ignore: [],
    rules:{
      nama_member:{
        required:true,
      },
      tempat_lahir:{
        required:true,
      },
      tanggal_lahir:{
        required:true,
      },
      tanggal_gabung:{
        required:true,
      },
      alamat:{
        required:true,
      },
      img_member:{
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


  $('select#id_program').on('change', function(){

    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;


    if (valueSelected==1) {
      $('#anak_member_nya').hide();
      $('#emailnya').show();
    } else if (valueSelected==2) {
      $('#anak_member_nya').show();
      $('#emailnya').hide();
    }
  });
</script>
@endsection
