<!--Header-part-->
<div id="header">
  <h1><a href="{{ route('dashboard') }}">Sportopia</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="{{ route('profile.index') }}"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
        {{-- <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li> --}}
      </ul>
    </li>
    <li class="dropdown {{ Route::is('inbox*') ? 'active' : '' }}" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Inbox</span> <span class="label label-important">{{ $getNotifInbox->count() }}</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        @php
        Carbon\Carbon::setLocale('en');
        @endphp
        @foreach ($getNotifInbox as $key)
          <li><a href="{{ route('inbox.index') }}">{{ $key->nama }} | {{ $key->created_at->diffForHumans() }}</a></li>
          <li class="divider"></li>
        @endforeach
        <li><a title="" href="{{ route('inbox.index') }}"> See All</a></li>
      </ul>
    </li>
    <li class=""><a href="{{ url('admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </li>
    {{-- <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li> --}}
  </ul>
</div>
<!--close-top-Header-menu-->
