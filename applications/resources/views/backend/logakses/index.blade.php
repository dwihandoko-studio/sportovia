@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Log Access</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('logAkses.index') }}" class="current">Log Access</a>
  </div>
  <h1>Log Access</h1>
</div>
@endsection

@section('content')

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Log Access</h5>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered tabellog">
      <thead>
        <tr>
          <th>No</th>
          <th>Actor</th>
          <th>Action</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($log as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->actor_name}}</td>
            <td>{{ $key->aksi}}</td>
            <td>{{ $key->created_at}}</td>
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
    $('.tabellog').dataTable({
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "sDom": '<""l>t<"F"fp>'
    });
  </script>
@endsection
