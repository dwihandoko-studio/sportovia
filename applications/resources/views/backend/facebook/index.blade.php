@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Facebook App</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Facebook App</a>
  </div>
  <h1>Facebook App</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Facebook App</h5>
    <a href="{{ route('facebook.ubah', array('id' => $getFacebook->id )) }}" class="btn btn-warning pull-right"><i class="icon-plus"></i> Edit</a>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="30%"><b>Page id</b></td>
          <td width="40%">{!! $getFacebook->page_id !!}</td>
        </tr>
        <tr>
          <td><b>App id</b></td>
          <td>{!! $getFacebook->app_id !!}</td>
        </tr>
        <tr>
          <td><b>App Secret</b></td>
          <td>{!! $getFacebook->app_secret!!}</td>
        </tr>
        <tr>
          <td><b>Deafult Access Token</b></td>
          <td>{!! $getFacebook->default_access_token !!}</td>
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
