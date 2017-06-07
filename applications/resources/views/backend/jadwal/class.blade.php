@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Schedule</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Add Schedule</a>
  </div>
  <h1>Add Schedule</h1>
</div>
@endsection

@section('content')

  @if (Session::has('gagal'))
    <script type="text/javascript">
      window.setTimeout(function() {
        $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
      }, 9000);
    </script>

    <div class="alert alert-danger alert-block" style="margin-bottom:0px;">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Oops, Something Wrong!</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#dc9f9f;">
      {{ Session::get('gagal') }}
    </div>
  @endif


<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
      <h5>Add Schedule</h5>
      <a href="{{ route('jadwal.index') }}" class="btn btn-inverse pull-right"> Back</a>
    </div>
  <div class="widget-content nopadding">
    <table class="table">
      <thead>
        <th><label class="control-label"><b>{{$getKelas->kelasKategori->kategori_kelas}}</b></label></th>
        <th><label class="control-label"><b>{{$getKelas->nama_kelas}}</b></label></th>
        <th><label class="control-label"><b>{{$getKelas->kelasProgram->program_kelas}}</b></label></th>
      </thead>
    </table>
    <form class="form-horizontal" method="post" action="{{ route('jadwal.classStore') }}" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="id_kelas" value="{{ $getKelas->id }}">
      <div class="control-group {{ $errors->has('id_member') ? 'error' : ''}}">
        <label class="control-label">Student *</label>
        <div class="controls">
          <select class="span6" name="id_member">
            <option value="">--Choose--</option>
            @foreach ($getMember as $key)
            <option value="{{ $key->id }}" {{ old('id_member') == $key->id ? 'selected=""' : '' }}>{{ $key->kode_member}} | {{ $key->nama_member }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('id_kelas_ruang') ? 'error' : ''}}">
        <label class="control-label">Room *</label>
        <div class="controls">
          <select class="span6" name="id_kelas_ruang">
            <option value="">--Choose--</option>
            @foreach ($getKelasRuang as $key)
            <option value="{{ $key->id }}" {{ old('id_kelas_ruang') == $key->id ? 'selected=""' : ''}}>{{ $key->lantai_kelas }} | {{ $key->nama_kelas }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('hari') ? 'error' : ''}}">
        <label class="control-label">Day *</label>
        <div class="controls">
          <select class="span6" name="hari">
            <option value="">--Choose--</option>
            <option value="Sunday" {{ old('hari') == 'Sunday' ? 'selected=""' : '' }} >Sunday</option>
            <option value="Monday" {{ old('hari') == 'Monday' ? 'selected=""' : '' }} >Monday</option>
            <option value="Tuesday" {{ old('hari') == 'Tuesday' ? 'selected=""' : '' }} >Tuesday</option>
            <option value="Wednesday" {{ old('hari') == 'Wednesday' ? 'selected=""' : '' }} >Wednesday</option>
            <option value="Thursday" {{ old('hari') == 'Thursday' ? 'selected=""' : '' }} >Thursday</option>
            <option value="Friday" {{ old('hari') == 'Friday' ? 'selected=""' : '' }} >Friday</option>
            <option value="Saturday" {{ old('hari') == 'Saturday' ? 'selected=""' : '' }} >Saturday</option>
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('jam_mulai') ? 'error' : ''}}">
        <label class="control-label">Start *</label>
        <div class="controls">
          <select class="span6" name="jam_mulai">
            <option value="">--Choose--</option>
            <option value="08:00 AM" {{ old('jam_mulai') == '08:00 AM' ? 'selected=""' : '' }}>08:00 AM</option>
            <option value="08:30 AM" {{ old('jam_mulai') == '08:30 AM' ? 'selected=""' : '' }}>08:30 AM</option>
            <option value="09:00 AM" {{ old('jam_mulai') == '09:00 AM' ? 'selected=""' : '' }}>09:00 AM</option>
            <option value="09:30 AM" {{ old('jam_mulai') == '09:30 AM' ? 'selected=""' : '' }}>09:30 AM</option>
            <option value="10:00 AM" {{ old('jam_mulai') == '10:00 AM' ? 'selected=""' : '' }}>10:00 AM</option>
            <option value="10:30 AM" {{ old('jam_mulai') == '10:30 AM' ? 'selected=""' : '' }}>10:30 AM</option>
            <option value="11:00 AM" {{ old('jam_mulai') == '11:00 AM' ? 'selected=""' : '' }}>11:00 AM</option>
            <option value="11:30 AM" {{ old('jam_mulai') == '11:30 AM' ? 'selected=""' : '' }}>11:30 AM</option>
            <option value="12:00 AM" {{ old('jam_mulai') == '12:00 AM' ? 'selected=""' : '' }}>12:00 AM</option>
            <option value="12:30 PM" {{ old('jam_mulai') == '12:30 PM' ? 'selected=""' : '' }}>12:30 PM</option>
            <option value="01:00 PM" {{ old('jam_mulai') == '01:00 PM' ? 'selected=""' : '' }}>01:00 PM</option>
            <option value="01:30 PM" {{ old('jam_mulai') == '01:30 PM' ? 'selected=""' : '' }}>01:30 PM</option>
            <option value="02:00 PM" {{ old('jam_mulai') == '02:00 PM' ? 'selected=""' : '' }}>02:00 PM</option>
            <option value="02:30 PM" {{ old('jam_mulai') == '02:30 PM' ? 'selected=""' : '' }}>02:30 PM</option>
            <option value="03:00 PM" {{ old('jam_mulai') == '03:00 PM' ? 'selected=""' : '' }}>03:00 PM</option>
            <option value="03:30 PM" {{ old('jam_mulai') == '03:30 PM' ? 'selected=""' : '' }}>03:30 PM</option>
            <option value="04:00 PM" {{ old('jam_mulai') == '04:00 PM' ? 'selected=""' : '' }}>04:00 PM</option>
            <option value="04:30 PM" {{ old('jam_mulai') == '04:30 PM' ? 'selected=""' : '' }}>04:30 PM</option>
            <option value="05:00 PM" {{ old('jam_mulai') == '05:00 PM' ? 'selected=""' : '' }}>05:00 PM</option>
            <option value="05:30 PM" {{ old('jam_mulai') == '05:30 PM' ? 'selected=""' : '' }}>05:30 PM</option>
            <option value="06:00 PM" {{ old('jam_mulai') == '06:00 PM' ? 'selected=""' : '' }}>06:00 PM</option>
            <option value="06:30 PM" {{ old('jam_mulai') == '06:30 PM' ? 'selected=""' : '' }}>06:30 PM</option>
            <option value="07:00 PM" {{ old('jam_mulai') == '07:00 PM' ? 'selected=""' : '' }}>07:00 PM</option>
            <option value="07:30 PM" {{ old('jam_mulai') == '07:30 PM' ? 'selected=""' : '' }}>07:30 PM</option>
            <option value="08:00 PM" {{ old('jam_mulai') == '08:00 PM' ? 'selected=""' : '' }}>08:00 PM</option>
            <option value="08:30 PM" {{ old('jam_mulai') == '08:30 PM' ? 'selected=""' : '' }}>08:30 PM</option>
            <option value="09:00 PM" {{ old('jam_mulai') == '09:00 PM' ? 'selected=""' : '' }}>09:00 PM</option>
            <option value="09:30 PM" {{ old('jam_mulai') == '09:30 PM' ? 'selected=""' : '' }}>09:30 PM</option>
            <option value="10:00 PM" {{ old('jam_mulai') == '10:00 PM' ? 'selected=""' : '' }}>10:00 PM</option>
            <option value="10:30 PM" {{ old('jam_mulai') == '10:30 PM' ? 'selected=""' : '' }}>10:30 PM</option>
            <option value="11:00 PM" {{ old('jam_mulai') == '11:00 PM' ? 'selected=""' : '' }}>11:00 PM</option>
            <option value="11:30 PM" {{ old('jam_mulai') == '11:30 PM' ? 'selected=""' : '' }}>11:30 PM</option>
          </select>
        </div>
      </div>
      <div class="control-group {{ $errors->has('jam_akhir') ? 'error' : ''}}">
        <label class="control-label">End *</label>
        <div class="controls">
          <select class="span6" name="jam_akhir">
            <option value="">--Choose--</option>
            <option value="08:00 AM" {{ old('jam_akhir') == '08:00 AM' ? 'selected=""' : '' }}>08:00 AM</option>
            <option value="08:30 AM" {{ old('jam_akhir') == '08:30 AM' ? 'selected=""' : '' }}>08:30 AM</option>
            <option value="09:00 AM" {{ old('jam_akhir') == '09:00 AM' ? 'selected=""' : '' }}>09:00 AM</option>
            <option value="09:30 AM" {{ old('jam_akhir') == '09:30 AM' ? 'selected=""' : '' }}>09:30 AM</option>
            <option value="10:00 AM" {{ old('jam_akhir') == '10:00 AM' ? 'selected=""' : '' }}>10:00 AM</option>
            <option value="10:30 AM" {{ old('jam_akhir') == '10:30 AM' ? 'selected=""' : '' }}>10:30 AM</option>
            <option value="11:00 AM" {{ old('jam_akhir') == '11:00 AM' ? 'selected=""' : '' }}>11:00 AM</option>
            <option value="11:30 AM" {{ old('jam_akhir') == '11:30 AM' ? 'selected=""' : '' }}>11:30 AM</option>
            <option value="12:00 AM" {{ old('jam_akhir') == '12:00 AM' ? 'selected=""' : '' }}>12:00 AM</option>
            <option value="12:30 PM" {{ old('jam_akhir') == '12:30 PM' ? 'selected=""' : '' }}>12:30 PM</option>
            <option value="01:00 PM" {{ old('jam_akhir') == '01:00 PM' ? 'selected=""' : '' }}>01:00 PM</option>
            <option value="01:30 PM" {{ old('jam_akhir') == '01:30 PM' ? 'selected=""' : '' }}>01:30 PM</option>
            <option value="02:00 PM" {{ old('jam_akhir') == '02:00 PM' ? 'selected=""' : '' }}>02:00 PM</option>
            <option value="02:30 PM" {{ old('jam_akhir') == '02:30 PM' ? 'selected=""' : '' }}>02:30 PM</option>
            <option value="03:00 PM" {{ old('jam_akhir') == '03:00 PM' ? 'selected=""' : '' }}>03:00 PM</option>
            <option value="03:30 PM" {{ old('jam_akhir') == '03:30 PM' ? 'selected=""' : '' }}>03:30 PM</option>
            <option value="04:00 PM" {{ old('jam_akhir') == '04:00 PM' ? 'selected=""' : '' }}>04:00 PM</option>
            <option value="04:30 PM" {{ old('jam_akhir') == '04:30 PM' ? 'selected=""' : '' }}>04:30 PM</option>
            <option value="05:00 PM" {{ old('jam_akhir') == '05:00 PM' ? 'selected=""' : '' }}>05:00 PM</option>
            <option value="05:30 PM" {{ old('jam_akhir') == '05:30 PM' ? 'selected=""' : '' }}>05:30 PM</option>
            <option value="06:00 PM" {{ old('jam_akhir') == '06:00 PM' ? 'selected=""' : '' }}>06:00 PM</option>
            <option value="06:30 PM" {{ old('jam_akhir') == '06:30 PM' ? 'selected=""' : '' }}>06:30 PM</option>
            <option value="07:00 PM" {{ old('jam_akhir') == '07:00 PM' ? 'selected=""' : '' }}>07:00 PM</option>
            <option value="07:30 PM" {{ old('jam_akhir') == '07:30 PM' ? 'selected=""' : '' }}>07:30 PM</option>
            <option value="08:00 PM" {{ old('jam_akhir') == '08:00 PM' ? 'selected=""' : '' }}>08:00 PM</option>
            <option value="08:30 PM" {{ old('jam_akhir') == '08:30 PM' ? 'selected=""' : '' }}>08:30 PM</option>
            <option value="09:00 PM" {{ old('jam_akhir') == '09:00 PM' ? 'selected=""' : '' }}>09:00 PM</option>
            <option value="09:30 PM" {{ old('jam_akhir') == '09:30 PM' ? 'selected=""' : '' }}>09:30 PM</option>
            <option value="10:00 PM" {{ old('jam_akhir') == '10:00 PM' ? 'selected=""' : '' }}>10:00 PM</option>
            <option value="10:30 PM" {{ old('jam_akhir') == '10:30 PM' ? 'selected=""' : '' }}>10:30 PM</option>
            <option value="11:00 PM" {{ old('jam_akhir') == '11:00 PM' ? 'selected=""' : '' }}>11:00 PM</option>
            <option value="11:30 PM" {{ old('jam_akhir') == '11:30 PM' ? 'selected=""' : '' }}>11:30 PM</option>
          </select>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" value="Submit" class="btn btn-success">
      </div>
    </form>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
  $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
  $("#basic_validate").validate({
    ignore: [],
    rules:{
      id_member:{
        required:true,
      },
      id_kelas_ruang:{
        required:true,
      },
      hari:{
        required:true,
      },
      jam_mulai:{
        required:true,
      },
      jam_akhir:{
        required:true,
      },
    },
    errorClass: "help-inline",
    errorElement: "span",
    highlight:function(element, errorClass, validClass) {
      $(element).parents('.control-group').addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.control-group').removeClass('error');
      $(element).parents('.control-group').addClass('success');
    }
  });
</script>
@endsection
