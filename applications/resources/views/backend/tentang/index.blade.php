@extends('backend.layouts.app')

@section('title')
<title>Sportopia | About</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('tentang.index') }}" class="current">About</a>
  </div>
  <h1>About</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>About</h5>
    @if($getTentang->isEmpty())
    <a href="{{ route('tentang.tambah') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
    @else
    <a href="{{ route('tentang.ubah', array('id' => $getTentang[0]->id )) }}" class="btn btn-warning pull-right"><i class="icon-plus"></i> Edit</a>
    @endif
  </div>
  <div class="widget-content">
    @if($getTentang->isEmpty())
    @else
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="30%"><b>About</b></td>
          <td width="40%">{!! $getTentang[0]->deskripsi_tentang !!}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><b>Vision</b></td>
          <td>{!! $getTentang[0]->visi !!}</td>
          <td><img src="{{ asset('amadeo/images/tentang').'/'.$getTentang[0]->img_visi }}" class="thumbnail" alt=""></td>
        </tr>
        <tr>
          <td><b>Mission</b></td>
          <td>{!! $getTentang[0]->misi!!}</td>
          <td><img src="{{ asset('amadeo/images/tentang').'/'.$getTentang[0]->img_misi}}" class="thumbnail" alt=""></td>
        </tr>
      </tbody>
    </table>
    @endif
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
