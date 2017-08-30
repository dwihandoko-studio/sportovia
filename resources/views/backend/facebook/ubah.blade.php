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
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <form class="form-horizontal" action="{{ route('facebook.edit') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $getFacebook->id }}">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><b>Page id</b></td>
          <td><input type="text" name="page_id" value="{!! $getFacebook->page_id !!}"></td>
        </tr>
        <tr>
          <td><b>App id</b></td>
          <td><input type="text" name="app_id" value="{!! $getFacebook->app_id !!}"></td>
        </tr>
        <tr>
          <td><b>App Secret</b></td>
          <td><input type="text" name="app_secret" value="{!! $getFacebook->app_secret!!}"></td>
        </tr>
        <tr>
          <td><b>Deafult Access Token</b></td>
          <td><textarea name="default_access_token" rows="8" cols="80">{!! $getFacebook->default_access_token !!}</textarea></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" style="text-align:center;"><input type="submit" value="Save" class="btn btn-success"></td>
        </tr>
      </tfoot>
    </table>
    </form>
  </div>
</div>
@endsection
