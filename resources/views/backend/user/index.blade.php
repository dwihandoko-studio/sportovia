@extends('backend.layouts.app')

@section('title')
<title>Sportopia | User Admin</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">User Admin</a>
  </div>
  <h1>User Admin</h1>
</div>
@endsection

@section('content')

  <div id="modal-unpublish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Deavticated Admin</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to deactivated this admin ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnpublish">Submit</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-publish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Acivated Admin</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to activated this admin ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setPublish">Submit</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-reset" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Reset Password</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to reset this password ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setReset">Submit</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

<div class="span5">
  <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Add New Admin</h5>
      </div>
    <div class="widget-content nopadding">
      <form class="form-horizontal" method="post" action="{{ route('userAdmin.newUser') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group">
          <label class="control-label">Name *</label>
          <div class="controls">
            <input type="text" class="span9" name="name" value="{{ old('name')}}" id="name">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Email *</label>
          <div class="controls">
            <input type="text" name="email" class="span9" id="email" value="{{ old('email') }}">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Role *</label>
          <div class="controls">
            <select class="span9" name="role_id">
              <option value="">--Choose--</option>
              <option value="2">Admin</option>
              <option value="4">Marketing</option>
              <option value="5">Operational</option>
            </select>
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" value="Submit" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>
<div class="span6">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>User Admin List</h5>
    </div>
    <div class="widget-content" style="overflow-x:auto;">
      <table class="table table-bordered socmed-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getUsers as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->name }}</td>
            <td>{{ $key->email }}</td>
            <td>@if($key->role_id == 1)
              Administrator
            @elseif ($key->role_id == 2)
              Admin
            @elseif ($key->role_id == 4)
              Marketing
            @elseif ($key->role_id == 5)
              Operational
            @endif</td>
            <td>@if ($key->flag_status == 1)
              @if (Auth::guard('admin')->id() == $key->id)
              <a><span class="label label-success tip-top" data-original-title="Active"><i class="icon icon-thumbs-up"></i></span></a>
              @else
              <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Active"><i class="icon icon-thumbs-up"></i></span></a>
              @endif
            @else
              @if (Auth::guard('admin')->id() == $key->id)
              <a><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Deactivated"><i class="icon icon-thumbs-down"></i></span></a>
              @else
              <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Deactivated"><i class="icon icon-thumbs-down"></i></span></a>
              @endif
            @endif</td>
            <td><a href="" class="reset" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-reset"><span class="label label-inverse tip-top" data-toggle="tooltip" data-placement="top" title="Reset Password"><i class="icon icon-refresh"></i></span></a></td>
          </tr>
          @php
            $no++;
          @endphp
          @endforeach
        </tbody>
      </table>
    </div>
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

<script type="text/javascript">
$(function(){
  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/user/account/"+a);
  });

  $('a.publish').click(function(){
    var a = $(this).data('value');
    $('#setPublish').attr('href', "{{ url('/') }}/admin/user/account/"+a);
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
@endsection
