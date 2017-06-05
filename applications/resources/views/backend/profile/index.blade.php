@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Profile</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Profile</a>
  </div>
  <h1>Profile</h1>
</div>
@endsection

@section('content')

  <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Profile</h5>
      </div>
    <div class="widget-content nopadding">
      <form class="form-horizontal" method="post" action="{{ route('profile.changePassword') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $getUser->id }}">
        <div class="control-group">
          <label class="control-label">Name *</label>
          <div class="controls">
            <input type="text" class="span9" name="name" value="{{ old('name', $getUser->name )}}" id="name">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Email *</label>
          <div class="controls">
            <input type="text" name="email" class="span9" id="email" value="{{ old('email', $getUser->email) }}">
            @if($errors->has('email'))
            <span for="email" generated="true" class="help-inline">{{ $errors->first('email') }}</span>
            @endif
          </div>
        </div>
        <div class="control-group {{ ($errors->has('oldpass')) ? 'error' : '' }}">
          <label class="control-label">Old Password</label>
          <div class="controls">
            <input id="oldpass" type="password" name="oldpass" />
            @if($errors->has('oldpass'))
            <span for="oldpass" generated="true" class="help-inline">{{ $errors->first('oldpass') }}</span>
            @endif
          </div>
        </div>
        <div class="control-group {{ ($errors->has('newpass')) ? 'error' : '' }}">
          <label class="control-label">Password</label>
          <div class="controls">
            <input id="newpass" type="password" name="newpass" />
            @if($errors->has('newpass'))
            <span for="newpass" generated="true" class="help-inline">{{ $errors->first('newpass') }}</span>
            @endif
          </div>
        </div>
        <div class="control-group {{ ($errors->has('newpass_confirmation')) ? 'error' : '' }}">
          <label class="control-label">Confirm Password</label>
          <div class="controls">
            <input id="newpass_confirmation" type="password" name="newpass_confirmation" />
            @if($errors->has('newpass_confirmation'))
            <span for="newpass_confirmation" generated="true" class="help-inline">{{ $errors->first('newpass_confirmation') }}</span>
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
<script type="text/javascript">
  $('.socmed-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>'
  });

  $("#basic_validate").validate({
    rules:{
      name:{
        required:true
      },
      email:{
        required:true,
        email:true,
      },
      oldpass: "required",
			newpass: "required",
      newpass_confirmation: {
				equalTo: "#newpass"
			},
    },
    messages: {
				oldpass: "You must enter the old password",
        newpass: "You must enter the new password",
				newpass_confirmation: { equalTo: "Password don't match" },
				email: { required: "Please, enter your email", email: "Correct email format is name@domain.com" },
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

<script type="text/javascript">
$(function(){
  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/social-media/publish/"+a);
  });

  $('a.publish').click(function(){
    var a = $(this).data('value');
    $('#setPublish').attr('href', "{{ url('/') }}/admin/social-media/publish/"+a);
  });

  $('a.reset').click(function(){
    var a = $(this).data('value');
    $('#setReset').attr('href', "{{ url('/') }}/admin/user/"+a);
  });
});
</script>

@if(Session::has('berhasil'))
<script type="text/javascript">
  $.gritter.add({
    title:	'Success',
    text:	'{{ Session::get('berhasil') }}',
    sticky: false
  });
</script>
@endif

@if(Session::has('erroroldpass'))
<script type="text/javascript">
  $.gritter.add({
    title:	'Failed',
    text:	'{{ Session::get('erroroldpass') }}',
    sticky: false
  });
</script>
@endif
@endsection
