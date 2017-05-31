@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Course</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasKursus.index') }}">Class Course</a>
    <a href="" class="current">View Class Course</a>
  </div>
  <h1>View Class Course</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>View Class Course</h5>
    <a href="{{ route('kelasKursus.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
    <a href="{{ route('kelasKursus.ubah', array('id' => $get->id )) }}" class="btn btn-warning pull-right"><i class="icon-plus"></i> Edit</a>
  </div>
  <div class="widget-content"  style="overflow-x:auto;">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="30%"><b>Category</b></td>
          <td width="40%">{!! $get->kelasKategori->kategori_kelas !!}</td>
        </tr>
        <tr>
          <td><b>Program</b></td>
          <td>{{ ($get->id_program == 1) ? 'Children' : 'Regular' }}</td>
        </tr>
        <tr>
          <td><b>Name</b></td>
          <td>{{ $get->nama_kelas }}</td>
        </tr>
        <tr>
          <td><b>Quotes</b></td>
          <td>{{ $get->quotes }}</td>
        </tr>
        <tr>
          <td><b>Description</b></td>
          <td>{!! $get->deskripsi_kelas !!}</td>
        </tr>
        <tr>
          <td><b>Image</b></td>
          <td><img src="{{ asset('amadeo/images/class').'/'.$get->img_url}}" class="thumbnail" alt="{{ $get->img_alt}}"></td>
        </tr>
        <tr>
          <td><b>Facility</b></td>
          <td>{{ $get->fasilitas }}</td>
        </tr>
        <tr>
          <td><b>Video Url</b></td>
          <td>@if (!$get->video_url) - @else {{ $get->video_url }} @endif <br>
              @if ($get->video_url != null)
                  @php
                    $url = $get->video_url;
                    $step1=explode('v=', $url);
                    $step2 =explode('&',$step1[1]);
                    $vedio_id = $step2[0];
                  @endphp
                  <iframe class="youtube-embed" src="http://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
              @endif</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>@if ($get->flag_publish == 1)
            <a href=""><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href=""><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


@endsection

@section('script')
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
