@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Inbox</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Inbox</a>
  </div>
  <h1>Inbox</h1>
</div>
@endsection

@section('content')
<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Inbox</h5>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered inbox-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Telp</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getInbox as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->nama }}</td>
          <td>{{ $key->telp }}</td>
          <td>{{ $key->email }}</td>
          <td>{{ $key->subjek }}</td>
          <td>{{ $key->pesan }}</td>
          <td>{{ $key->created_at }}</td>
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
    $('.inbox-table').dataTable({
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "sDom": '<""l>t<"F"fp>',
      "iDisplayLength": 100
    });
  </script>

@endsection
