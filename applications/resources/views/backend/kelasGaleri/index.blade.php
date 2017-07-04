@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Class Gallery</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Class Gallery</a>
  </div>
  <h1>Class Gallery</h1>
</div>
@endsection

@section('content')


<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Class Gallery</h5>
    <a href="{{ route('kelasKursus.index') }}" class="btn btn-primary pull-right"><i class="icon-plus"></i> Back</a>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <form class="form-horizontal" method="post" action="{{ route('kelasGaleri.store') }}" name="upload_gallery" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id_kelas" value="{{ $id_kelas }}">
    <div class="control-group {{ $errors->has('img_url.*') ? 'error' : '' }}">
      <label class="control-label">Image *</label>
      <div class="controls">
        <input name="img_url[]" class="span6" id="img_url" type="file"  accept=".jpg, .png" multiple/>
        <input type="submit" value="Submit" class="btn btn-mini btn-success">
      </div>
      @if($errors->has('img_url.*'))
      <div class="controls">
        <span for="img_url" generated="true" class="help-inline">{{ $errors->first('img_url.*') }}</span>
      </div>
      @endif
    </div>
    </form>
  </div>
  <div class="widget-content" style="overflow-x:auto;">
    <ul class="thumbnails">
      @foreach ($getGaleri as $key)
      <li class="span2">
        <a><img src="{{ asset('amadeo/images/gallery/').'/'.$key->img_url }}" alt="{{ $key->img_alt}}" ></a>
        <div class="actions">
          <a class="lightbox_trigger" href="{{ asset('amadeo/images/gallery/').'/'.$key->img_url }}"><i class="icon-search"></i></a>
          <a title="Delete" class="delete" data-value="{{ $key->id }}"><i class="icon-remove"></i></a>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  $('input[type=checkbox],input[type=radio],input[type=file]').uniform();

  $(function(){
    $('a.delete').click(function(){
      var a = $(this).data('value');
      $('.delete').attr('href', "{{ url('/') }}/admin/class-gallery/delete/"+a);
    });
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
