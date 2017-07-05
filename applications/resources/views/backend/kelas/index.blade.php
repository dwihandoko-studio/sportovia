@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Course</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasKursus.index') }}" class="current">Class Course</a>
  </div>
  <h1>Class Course</h1>
</div>
@endsection

@section('content')

  <div id="modal-unpublish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Unpublish Class Course</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to unpublish this class course ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnpublish">Unpublish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-publish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Publish Class Course</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to publish this class course ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setPublish">Publish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-unhome" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Remove From Homepage Slider</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to remove this class course from homepage slider ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnhome">Remove</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-home" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Show to Homepage Slider Class Course</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to show in Homepage Slider this class course ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setHome">Show Slider</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Class Course</h5>
    <a href="{{ route('kelasGaleri.allGaleri') }}" class="btn btn-success pull-right"><i class="icon-plus"></i> All Gallery</a>
    <a href="{{ route('kelasKursus.tambah') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
  <div class="widget-content nopadding" style="overflow-x:auto;">
    <table class="table table-bordered kelasKursus-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Class Name</th>
          <th>Category</th>
          <th>Program</th>
          <th>Quotes</th>
          <th>Description</th>
          <th>Homepage Slider</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getKelas as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->nama_kelas }}</td>
          <td>{{ $key->kategori_kelas }}</td>
          <td>{{ $key->program_kelas }}</td>
          <td>{{ $key->quotes }}</td>
          <td>{!! $key->deskripsi_kelas !!}</td>
          <td>@if ($key->flag_homepage == 1)
            <a href="" class="unhome" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unhome"><span class="label label-success tip-top" data-original-title="Show Slider"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="home" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-home"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Remove Slider"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
          <td>@if ($key->flag_publish == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
          <td><a href="{{ route('kelasKursus.edit').'/'.$key->id }}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a>
          <a href="{{ route('kelasKursus.lihat', ['id' => $key->id]) }}"><span class="label label-primary tip-top" data-toggle="tooltip" data-placement="top" title="View"><i class="icon icon-folder-open"></i> View</span></a>
          <a href="{{ route('kelasGaleri.index', ['id' => $key->id]) }}"><span class="label label-success tip-top" data-toggle="tooltip" data-placement="top" title="Gallery"><i class="icon icon-picture"></i> Gallery</span></a>
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
  $('.kelasKursus-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>'
  });
</script>

<script type="text/javascript">
$(function(){
  $('.kelasKursus-table').on('click','.unpublish', function(){
    var id = $(this).data('value');
    $('#setUnpublish').attr('href', '{{url('/')}}/admin/class-course/publish/'+id);
  });

  $('.kelasKursus-table').on('click','.publish', function(){
    var id = $(this).data('value');
    $('#setPublish').attr('href', '{{url('/')}}/admin/class-course/publish/'+id);
  });

  $('.kelasKursus-table').on('click','.unhome', function(){
    var id = $(this).data('value');
    $('#setUnhome').attr('href', '{{url('/')}}/admin/class-course/slider/'+id);
  });

  $('.kelasKursus-table').on('click','.home', function(){
    var id = $(this).data('value');
    $('#setHome').attr('href', '{{url('/')}}/admin/class-course/slider/'+id);
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
