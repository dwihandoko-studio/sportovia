@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Room</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="{{ route('kelasRuang.index') }}" class="current">Class Room</a>
  </div>
  <h1>Class Room</h1>
</div>
@endsection

@section('content')
  <div id="addKelasRuang" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Add Class Room</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post" action="{{ route('kelasRuang.store') }}" name="formAddKelasRuang" id="formAddKelasRuang" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group {{ $errors->has('nama_kelas') ? 'error' : ''}}">
          <label class="control-label">Room Name</label>
          <div class="controls">
            <input type="text" name="nama_kelas" class="span9" id="nama_kelas" value="{{ old('nama_kelas') }}">
            @if($errors->has('nama_kelas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('nama_kelas')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('lantai_kelas') ? 'error' : ''}}">
          <label class="control-label">Floor</label>
          <div class="controls">
            <select class="span9" name="lantai_kelas">
              <option value="1" {{ old('lantai_kelas') == 1 ? 'selected=""' : ''}}>1st</option>
              <option value="2" {{ old('lantai_kelas') == 2 ? 'selected=""' : ''}}>2nd</option>
              <option value="3" {{ old('lantai_kelas') == 3 ? 'selected=""' : ''}}>3rd</option>
              <option value="4" {{ old('lantai_kelas') == 4 ? 'selected=""' : ''}}>4th</option>
            </select>
            @if($errors->has('lantai_kelas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('lantai_kelas')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('kapasitas') ? 'error' : ''}}">
          <label class="control-label">Capacity</label>
          <div class="controls">
            <input type="text" name="kapasitas" class="span9" id="kapasitas" value="{{ old('kapasitas') }}">
            @if($errors->has('kapasitas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('kapasitas')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        {{-- <div class="control-group {{ $errors->has('link_cctv') ? 'error' : ''}}">
          <label class="control-label">Link CCTV</label>
          <div class="controls">
            <input type="text" name="link_cctv" class="span9" id="link_cctv" value="{{ old('link_cctv') }}">
            @if($errors->has('link_cctv'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('link_cctv')}}</strong>
    				</span>
  			    @endif
          </div>
        </div> --}}
    </div>
    <div class="modal-footer">
      <input type="submit" value="Submit" class="btn btn-success">
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
    </form>
  </div>


  <div id="editKelasRuang" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Edit Class Room</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" method="post" action="{{ route('kelasRuang.edit') }}" name="basic_validate" id="basic_validate" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group {{ $errors->has('edit_nama_kelas') ? 'error' : ''}}">
          <label class="control-label">Room Name</label>
          <div class="controls">
            <input type="hidden" name="id_edit" value="{{ old('id_edit')}}" id="id_kelas_ruang">
            <input type="text" name="edit_nama_kelas" class="span9" id="edit_nama_kelas" value="{{ old('edit_nama_kelas') }}">
            @if($errors->has('edit_nama_kelas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('edit_nama_kelas')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('edit_lantai_kelas') ? 'error' : ''}}">
          <label class="control-label">Floor</label>
          <div class="controls">
            <select class="span9" name="edit_lantai_kelas" id="edit_lantai_kelas">
              <option value="1" {{ old('edit_lantai_kelas') == 1 ? 'selected=""' : ''}} id="satu" >1st</option>
              <option value="2" {{ old('edit_lantai_kelas') == 2 ? 'selected=""' : ''}} id="dua" >2nd</option>
              <option value="3" {{ old('edit_lantai_kelas') == 3 ? 'selected=""' : ''}} id="tiga" >3rd</option>
              <option value="4" {{ old('edit_lantai_kelas') == 4 ? 'selected=""' : ''}} id="empat" >4th</option>
            </select>
            @if($errors->has('edit_lantai_kelas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('edit_lantai_kelas')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        <div class="control-group {{ $errors->has('edit_kapasitas') ? 'error' : ''}}">
          <label class="control-label">Capacity</label>
          <div class="controls">
            <input type="text" name="edit_kapasitas" class="span9" id="edit_kapasitas" value="{{ old('edit_kapasitas') }}">
            @if($errors->has('edit_kapasitas'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('edit_kapasitas')}}</strong>
    				</span>
  			    @endif
          </div>
        </div>
        {{-- <div class="control-group {{ $errors->has('edit_link_cctv') ? 'error' : ''}}">
          <label class="control-label">Llink CCTV</label>
          <div class="controls">
            <input type="text" name="edit_link_cctv" class="span9" id="edit_link_cctv" value="{{ old('edit_link_cctv') }}">
            @if($errors->has('edit_link_cctv'))
    				<span class="help-block">
    				  <strong>{{ $errors->first('edit_link_cctv')}}</strong>
    				</span>
  			    @endif
          </div>
        </div> --}}

    </div>
    <div class="modal-footer">
      <input type="submit" value="Submit" class="btn btn-success">
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
    </form>
  </div>

  <div id="modal-unpublish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>UnPublish Class Room</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to un publish this class room ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-danger" id="setUnpublish">Unpublish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>

  <div id="modal-publish" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3>Publish Class Room</h3>
    </div>
    <div class="modal-body">
      <p>Are you sure to publish this class room ?</p>
    </div>
    <div class="modal-footer">
      <a class="btn btn-success" id="setPublish">Publish</a>
      <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
  </div>


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Class Room</h5>
    <a href="#addKelasRuang" data-toggle="modal" class="btn btn-primary pull-right"><i class="icon-plus"></i> Add</a>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <table class="table table-bordered kelasRuang-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Room Name</th>
          <th>Floor</th>
          <th>Capacity</th>
          {{-- <th>Link CCTV</th> --}}
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;
        @endphp
        @foreach ($getRuang as $key)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $key->nama_kelas }}</td>
          <td>{{ $key->lantai_kelas }}</td>
          <td>{{ $key->kapasitas }}</td>
          {{-- <td>{{ $key->link_cctv }}</td> --}}
          {{-- <td>@if ($key->flag_publish == 1)
            <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-unpublish"><span class="label label-success tip-top" data-original-title="Publish"><i class="icon icon-thumbs-up"></i></span></a>
          @else
            <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target="#modal-publish"><span class="label label-important tip-top" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="icon icon-thumbs-down"></i></span></a>
          @endif</td> --}}
          <td><a href="" class="editKelasRuang" data-toggle="modal" data-target="#editKelasRuang" data-value="{{$key->id}}"><span class="label label-warning tip-top" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon icon-pencil"></i> Edit</span></a></td>
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
  $('.kelasRuang-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>',
    "iDisplayLength": 100
  });

  $("#formAddKelasRuang").validate({
    rules:{
      nama_kelas:{
        required:true
      },
      lantai_kelas:{
        required:true
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

<script type="text/javascript">
$(function(){
  $('a.editKelasRuang').click(function(){
    var a = $(this).data('value');
    $.ajax({
      url: "{{ url('/') }}/admin/class-room/edit/"+a,
      dataType: 'json',
      success: function(data){
        var id_kelas_ruang = data.id;
        var nama_kelas = data.nama_kelas;
        var lantai_kelas = data.lantai_kelas;
        var kapasitas = data.kapasitas;
        // var link_cctv = data.link_cctv;

        $('#id_kelas_ruang').attr('value', id_kelas_ruang);
        $('#edit_nama_kelas').attr('value', nama_kelas);
        $('#edit_lantai_kelas').attr('value', lantai_kelas);
        $('#edit_kapasitas').attr('value', kapasitas);
        // $('#edit_link_cctv').attr('value', link_cctv);

        if(lantai_kelas == 1){
          $('#satu').attr('selected', 'true');
        }else if(lantai_kelas == 2){
          $('#dua').attr('selected', 'true');
        }else if(lantai_kelas == 3){
          $('#tiga').attr('selected', 'true');
        }else{
          $('#empat').attr('selected', 'true');
        }

      }
    });
  });

  $('a.unpublish').click(function(){
    var a = $(this).data('value');
    $('#setUnpublish').attr('href', "{{ url('/') }}/admin/class-room/publish/"+a);
  });

  $('a.publish').click(function(){
    var a = $(this).data('value');
    $('#setPublish').attr('href', "{{ url('/') }}/admin/class-room/publish/"+a);
  });
});
</script>

@if($errors->has('nama_kelas'))
<script type="text/javascript">
  $('#addKelasRuang').modal('show');
</script>
@endif

@if($errors->has('edit_nama_kelas'))
<script type="text/javascript">
  $('#editKelasRuang').modal('show');
</script>
@endif

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
