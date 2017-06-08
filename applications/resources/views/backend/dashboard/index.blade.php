@extends('backend.layouts.app')

@section('title')
<title>Dashboard</title>
@endsection


@section('breadcrumb')

<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ route('dashboard') }}" class="current"><i class="icon-home"></i> Dashboard</a>
  </div>
</div>

@endsection


@section('dashboard')

  <div class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb span3"> <a href="{{ route('member.index') }}"> <i class="icon-group"></i> <span class="label label-success ">{{ $getMember->count() }}</span> Member </a> </li>
      <li class="bg_lr span2"> <a href="{{ route('kelasKursus.index') }}"> <i class="icon-magnet"></i> <span class="label label-success ">{{ $getClassCourse->count() }}</span> Class Course</a> </li>
      <li class="bg_ly span3"> <a href="{{ route('news.index') }}"> <i class="icon-th-list"></i> <span class="label label-success">{{ $getNews->count() }}</span> News </a> </li>
      <li class="bg_lg span2"> <a href="{{ route('event.index') }}"> <i class="icon-calendar"></i> <span class="label label-success">{{ $getEvent->count() }}</span> Event</a> </li>
      {{-- <li class="bg_lo"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
      <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
      <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
      <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
      <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> --}}
    </ul>
  </div>
@endsection

@section('content')

@endsection
