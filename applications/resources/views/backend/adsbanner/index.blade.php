@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Ads Banner</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Ads Banner</a>
  </div>
  <h1>Ads Banner</h1>
</div>
@endsection

@section('content')
  <div id="addAds" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Add Ads Banner</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post" action="{{ route('ads.store') }}" name="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="control-group {{ $errors->has('ads_judul') ? 'error' : ''}}">
          <label class="control-label">Ads Banner Name</label>
          <div class="controls">
            <input type="text" name="ads_judul" class="span9" id="ads_judul" value="{{ old('ads_judul') }}">
            @if($errors->has('ads_judul'))
    				<span class="help-inline">
    				  <strong>{{ $errors->first('ads_judul')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('img_url') ? 'error' : '' }}">
          <label class="control-label">Image Banner *</label>
          <div class="controls">
            <span>Width: 847px; Height: 627px</span>
          </div>
          <div class="controls">
            <input name="img_url" class="span6" type="file"  accept=".jpg, .png"/>
            @if($errors->has('img_url'))
            <span for="img_url" generated="true" class="help-inline">{{ $errors->first('img_url') }}</span>
            @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('img_alt') ? 'error' : ''}}">
          <label class="control-label">Image Alt</label>
          <div class="controls">
            <input type="text" name="img_alt" class="span9" id="img_alt" value="{{ old('img_alt') }}">
            @if($errors->has('img_alt'))
    				<span class="help-inline">
    				  <strong>{{ $errors->first('img_alt')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Tanggal Publish</label>
          <div class="controls">
            <div data-date="{{ date('Y-m-d') }}" class="input-append date tanggal_publish">
              <input type="text" name="tanggal_publish" value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd" class="span9" readonly="">
              <span class="add-on"><i class="icon-th"></i></span> </div>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input type="submit" value="Submit" class="btn btn-success">
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
    </form>
  </div>


  <div id="editAds" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Edit Ads Banner</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post" action="{{ route('ads.edit') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group {{ $errors->has('edit_ads_judul') ? 'error' : ''}}">
          <label class="control-label">Ads Banner Name</label>
          <div class="controls">
            <input type="hidden" name="id_edit" value="{{ old('id_edit')}}" id="id_ads">
            <input type="text" name="edit_ads_judul" class="span9" id="edit_ads_judul" value="{{ old('edit_ads_judul') }}">
            @if($errors->has('edit_ads_judul'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('edit_ads_judul')}}</strong>
    				</span>
  			  @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('edit_img_url') ? 'error' : '' }}">
          <label class="control-label">Image Banner *</label>
          <div class="controls">
            <span>Width: 847px; Height: 627px</span>
          </div>
          <div class="controls">
            <input name="edit_img_url" class="span6" id="edit_img_url" type="file"  accept=".jpg, .png"/>
            @if($errors->has('edit_img_url'))
            <span for="edit_img_url" generated="true" class="help-inline">{{ $errors->first('edit_img_url') }}</span>
            @endif
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input type="submit" value="Submit" class="btn btn-success">
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
    </form>
  </div>

  <div id="modal-unpublish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>UnPublish Ads Banner</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to un publish this ads banner ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnpublish">Unpublish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-publish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Publish Ads Banner</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to publish this ads banner ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setPublish">Publish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Ads Banner</h5>
    <a href="#addAds" data-toggle="modal" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered ads-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Ads Banner</th>
          <th>Image Banner</th>
          <th>Publish Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getAds as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->ads_judul }}</td>
          <td><img src="{{ asset('amadeo/images/ads/').'/'.$key->img_url }}" alt=""></td>
          <td>{{ $key->tanggal_publish }}</td>
          <td>@if ($key->flag_publish == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
          <td><a href="" class="editAds" data-toggle="modal" data-target="#editAds" data-value="{{$key->id}}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
        </tr>
        @php
          $no++;
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  $('.ads-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 100
  });

  $('.tanggal_publish').datepicker({
    format: 'yyyy-mm-dd',
  });
</script>

<script type="text/javascript">
$(function(){
  $('.ads-table').on('click','a.editAds', function(){
    var a = $(this).data('value');
    $.ajax({
      url: "{{ url('/') }}/admin/ads-banner/edit/"+a,
      dataType: 'json',
      success: function(data){
        var id_ads = data.id;
        var ads_judul = data.ads_judul;

        $('input[type="hidden"]#id_ads').attr('value', id_ads);
        $('input[type="text"]#edit_ads_judul').attr('value', ads_judul);
      }
    });
  });

  $('.ads-table').on('click','a.unpublish', function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/ads-banner/publish/"+a);
  });

  $('.ads-table').on('click','a.publish', function(){
      var a = $(this).data('value');
      $('#setPublish').attr('href', "{{ url('/') }}/admin/ads-banner/publish/"+a);
    });
});
</script>

@if($errors->has('ads_judul') || $errors->has('img_url') || $errors->has('img_alt') || $errors->has('tanggal_publish'))
<script type="text/javascript">
  $('#addAds').modal('show');
</script>
@endif

@if($errors->has('edit_ads_judul'))
<script type="text/javascript">
  $('#editAds').modal('show');
</script>
@endif

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
