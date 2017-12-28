@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Config Content</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Config Content</a>
  </div>
  <h1>Config Content</h1>
</div>
@endsection

@section('content')
  <div id="editAds" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Edit Content </h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{ route('ConfigContent.simpan') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group {{ $errors->has('edit_ads_judul') ? 'error' : ''}}">
          <label id="descript" class="control-label"> </label>
          <div class="controls">
            <input type="hidden" name="id" id="id">
            <textarea name="edit_ads_judul" class="span9" id="edit_ads_judul" rows="8"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Submit" class="btn btn-success">
        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
      </div>
    </form>
  </div>

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Config Content</h5>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered ads-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Description</th>
          <th>Content</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($call as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->descrip }}</td>
          <td>{{ $key->content }}</td>
          <td>
            <a 
              href="" 
              class="editAds" 
              data-toggle="modal" 
              data-target="#editAds" 
              data-value="{{$key->id}}">
                <span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span>
            </a>
          </td>
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
</script>

<script type="text/javascript">
$(function(){
  $('.ads-table').on('click','a.editAds', function(){
    var a = $(this).data('value');
    $.ajax({
      url: "{{ url('/') }}/admin/ConfigContent/edit/"+a,
      dataType: 'json',
      success: function(data){
        var id = data.id;
        var descrip = data.descrip;
        var content = data.content;

        $('#editAds input#id').attr('value', id);
        $('#editAds label#descript').html(descrip);
        $('#editAds textarea#edit_ads_judul').attr('value', content);
      }
    });
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
