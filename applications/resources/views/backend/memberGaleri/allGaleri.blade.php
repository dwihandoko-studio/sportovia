@extends('backend.layouts.app')

@section('title')
<title>Sportopia | Gallery Member</title>
@endsection


@section('breadcrumb')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Dashboard</a>
    <a href="" class="current">Gallery Member</a>
  </div>
  <h1>Gallery Member</h1>
</div>
@endsection

@section('content')

<div class="widget-box">
  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>Gallery Member</h5>
    <a href="{{ route('member.index') }}" class="btn btn-inverse pull-right"><i class="icon-plus"></i> Back</a>
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
    <div class="pagination">
      {{ $getGaleri->links() }}
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  $('.kelasKursus-table').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>'
  });

  $(function(){
    $('a.delete').click(function(){
      var a = $(this).data('value');
      $('.delete').attr('href', "{{ url('/') }}/admin/member-gallery/deletee/"+a);
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
