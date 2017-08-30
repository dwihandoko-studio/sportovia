@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Free Trial Register</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Free Trial Register</a>
  </div>
  <h1>Free Trial Register</h1>
</div>
@endsection

@section('content')

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Free Trial Register
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered free-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Class Course</th>
          <th>Program</th>
          <th>Name</th>
          <th>Day</th>
          <th>Session</th>
          <th>Telp</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Date</th>
          <th>Method</th>
          {{-- <th>Action</th> --}}
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getFree as $key)
        @php
          $hacep = explode('||', $key->pesan);
        @endphp
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->kelas->nama_kelas }}</td>
          <td>{{ $key->kelas->kelasProgram->program_kelas }}</td>
          <td>{{ $key->nama }}</td>
          <td>{{ $hacep[1] or '-' }}</td>
          <td>{{ $hacep[2] or '-' }}</td>
          <td>{{ $key->telp }}</td>
          <td>{{ $key->email }}</td>
          <td>{{ $key->subjek }}</td>
          <td>{{ $hacep[0] }}</td>
          <td>{{ $key->created_at }}</td>
          <td>{!! $key->type == 1 ? '<span class="label label-primary">Free Trial</span>' : '<span class="label label important">Register</span>' !!}</td>
          {{-- <td><a href=""><span class="label label-warning tip-top"><i class="icon icon-pencil"></i> Edit</span></a></td> --}}
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
$('.free-table').dataTable({
  "bJQueryUI": true,
  "sPaginationType": "full_numbers",
  "sDom": '<""l>t<"F"fp>',
  "iDisplayLength": 100,
  "ordering": false,
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
