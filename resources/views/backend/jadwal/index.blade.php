@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Schedule</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('jadwal.index') }}" class="current">Schedule</a>
  </div>
  <h1>Schedule</h1>
</div>
@endsection

@section('content')

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Schedule</h5>
    <a href="{{ route('jadwal.classMember') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
</div>


<div class="widget-box collapsible">
  <div class="widget-title">
    <a href="#collapse" data-toggle="collapse" class="">
      <span class="icon"><i class="icon-search icon-white"></i></span>
      <h5>Search Class</h5>
    </a>
  </div>
  <div class="collapse" id="collapse">
    <div class="widget-content nopadding">
      <form class="form-horizontal" action="{{ route('jadwal.search') }}" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate">
      {{ csrf_field() }}
      <div class="control-group {{ $errors->has('id_kelas') ? 'error' : ''}}">
        <label class="control-label">Search Class *</label>
        <div class="controls">
          <select class="span6" name="id_kelas">
            <option value="">--Choose--</option>
            @if (isset($pilihKelas))
            @foreach ($getKelas as $key)
            <option value="{{ $key->id }}" {{ old('id_kelas', $pilihKelas->id) == $key->id ? 'selected=""' : ''}}>{{ $key->nama_kelas }}</option>
            @endforeach
            @else
            @foreach ($getKelas as $key)
            <option value="{{ $key->id }}" {{ old('id_kelas') == $key->id ? 'selected=""' : ''}}>{{ $key->nama_kelas }}</option>
            @endforeach
            @endif
          </select>
          &nbsp;&nbsp;&nbsp;
          <input type="submit" value="Search" class="btn btn-success">
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


@if (isset($pilihKelas))
  <div class="row-fluid">
    <div class="span4">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
          <h5>{{ $pilihKelas->nama_kelas}}</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table">
            <tbody>
              <tr>
                <td width="40%"><b>Class Category</b></td>
                <td>&nbsp;</td>
                <td width="60%">{!! $pilihKelas->kelasKategori->kategori_kelas !!}</td>
              </tr>
              <tr>
                <td><b>Class Program</b></td>
                <td>&nbsp;</td>
                <td>{!! $pilihKelas->kelasProgram->program_kelas !!}</td>
              </tr>
              <tr>
                <td><b>Description</b></td>
                <td>&nbsp;</td>
                <td>{{ strip_tags($pilihKelas->deskripsi_kelas) }}</td>
              </tr>
              <tr>
                <td><b>Quotes</b></td>
                <td>&nbsp;</td>
                <td>{!! $pilihKelas->quotes !!}</td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center"><a href="{{ route('jadwal.seeSchedule', ['id' => $pilihKelas->id ]) }}" class="btn btn-primary"><i class="icon-eye-open"></i> Schedule</a></td>
                <td><a href="{{ route('jadwal.class', ['id' => $pilihKelas->id ]) }}" class="btn btn-primary"><i class="icon-plus"></i> Add Student</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@else
  @foreach (array_chunk($getKelas->all(), 3) as $kelas)
    <div class="row-fluid">
      @foreach ($kelas as $key)
        <div class="span4">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
              <h5>{{ $key->nama_kelas}}</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table">
                <tbody>
                  <tr>
                    <td width="40%"><b>Class Category</b></td>
                    <td>&nbsp;</td>
                    <td width="60%">{!! $key->kelasKategori->kategori_kelas !!}</td>
                  </tr>
                  <tr>
                    <td><b>Class Program</b></td>
                    <td>&nbsp;</td>
                    <td>{!! $key->kelasProgram->program_kelas !!}</td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td>&nbsp;</td>
                    <td>{{ strip_tags($key->deskripsi_kelas) }}</td>
                  </tr>
                  <tr>
                    <td><b>Quotes</b></td>
                    <td>&nbsp;</td>
                    <td>{!! $key->quotes !!}</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align:center"><a href="{{ route('jadwal.seeSchedule', ['id' => $key->id ]) }}" class="btn btn-primary"><i class="icon-eye-open"></i> Schedule</a></td>
                    <td><a href="{{ route('jadwal.class', ['id' => $key->id ]) }}" class="btn btn-primary"><i class="icon-plus"></i> Add Student</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endforeach


@endif


@endsection

@section('script')
<script type="text/javascript">
  $('.fasilitas-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 100
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
