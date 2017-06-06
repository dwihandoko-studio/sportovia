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
    <a href="" class="current">Edit Member</a>
  </div>
  <h1>Edit Member</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Edit Member</h5>
      <a href="{{ route('member.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    @if ($checkParent != null)
    <table class="table">
      <thead>
        <th><label class="control-label"><b>Parent Name</b></label></th>
        <th><label class="control-label"><b>Parent Email</b></label></th>
      </thead>
      <tbody>
        <tr>
          <td style="text-align:center;"><label class="control-label"><b>{{ $checkParent->nama_member }}</b></label></td>
          <td style="text-align:center;"><label class="control-label"><b>{{ $checkParent->email }}</b></label></td>
        </tr>
      </tbody>
    </table>
    @endif


    <form class="form-horizontal" method="post" action="{{ route('member.edit') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $getMember->id }}">
      <div class="control-group {{ $errors->has('kode_member') ? 'error' : '' }}">
        <label class="control-label">Member Code *</label>
        <div class="controls">
          <input type="text" class="span6" name="kode_member" readonly="" value="{{ $getMember->kode_member }}">
        </div>
      </div>
      @if ($getMember->email != null)
      <div class="control-group {{ $errors->has('email') ? 'error' : '' }}" id="emailnya">
        <label class="control-label">Email *</label>
        <div class="controls">
          <input type="text" name="email" value="{{ old('email', $getMember->email) }}" class="span6" id="email">
        </div>
      </div>
      @endif
      <div class="control-group {{ $errors->has('nama_member') ? 'error' : '' }}">
        <label class="control-label">Name *</label>
        <div class="controls">
          <input type="text" name="nama_member" value="{{ old('nama_member', $getMember->nama_member) }}" class="span6" id="nama_member">
        </div>
      </div>
      <div class="control-group {{ $errors->has('tempat_lahir') ? 'error' : '' }}">
        <label class="control-label">Birth Place *</label>
        <div class="controls">
          <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $getMember->tempat_lahir) }}" class="span6" id="tempat_lahir">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Birth Date</label>
        <div class="controls">
          <div data-date="{{ date('Y-m-d') }}" class="input-append date tanggal_lahir">
            <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir', $getMember->tanggal_lahir) }}" data-date-format="yyyy-mm-dd" class="span9" readonly="">
            <span class="add-on"><i class="icon-th"></i></span> </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Join Date</label>
        <div class="controls">
          <div data-date="{{ date('Y-m-d') }}" class="input-append date tanggal_gabung">
            <input type="text" name="tanggal_gabung" value="{{ old('tanggal_gabung', $getMember->tanggal_gabung) }}" data-date-format="yyyy-mm-dd" class="span9" readonly="">
            <span class="add-on"><i class="icon-th"></i></span> </div>
        </div>
      </div>
      <div class="control-group {{ $errors->has('alamat') ? 'error' : '' }}">
        <label class="control-label">Address *</label>
        <div class="controls">
          <textarea name="alamat" class="span6" id="alamat" cols="8" rows="8">{{ old('alamat', $getMember->alamat) }}</textarea>
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
