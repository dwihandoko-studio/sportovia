@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Contact</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kontak.index') }}">Contact</a>
    <a href="" class="current">Add Contact</a>
  </div>
  <h1>Add Contact</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Contact</h5>
      <a href="{{ route('kontak.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    </div>
  <div class="widget-content nopadding">
    <form class="form-horizontal" method="post" action="{{ route('kontak.store') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
      {{ csrf_field() }}
      <div class="control-group">
        <label class="control-label">Marketing</label>
        <div class="controls">
          <textarea name="marketing" class="span9" id="required">{{ old('marketing') }}</textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Office</label>
        <div class="controls">
          <textarea name="office" class="span9" id="office">{{ old('office') }}</textarea>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Email</label>
        <div class="controls">
          <input type="text" name="email" class="span9" id="email" value="{{ old('email') }}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Address</label>
        <div class="controls">
          <textarea name="alamat" class="span9" id="alamat">{{ old('alamat') }}</textarea>
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
  $("#basic_validate").validate({
    rules:{
      marketing:{
        required:true
      },
      office:{
        required:true
      },
      alamat:{
        required:true
      },
      email:{
        required:true,
        email: true
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
