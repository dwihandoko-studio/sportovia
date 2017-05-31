<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a>
    </li>
    <li class="submenu {{ Route::is('tentang*') ? 'active' : '' }}{{ Route::is('staff-jabatan*') ? 'active' : ''}}{{ Route::is('pegawai*') ? 'active' : ''}}">
      <a href="#"><i class="icon icon-asterisk"></i> <span>About</span></a>
      <ul>
        <li class="{{ Route::is('tentang*') ? 'active' : '' }}"><a href="{{ route('tentang.index')}}">About</a></li>
        <li class="{{ Route::is('pegawai*') ? 'active' : ''}}"><a href="{{ route('pegawai.index')}}">Staff</a></li>
        <li class="{{ Route::is('staff-jabatan*') ? 'active' : ''}}"><a href="{{ route('staff-jabatan.index') }}">Staff Position</a></li>
      </ul>
    </li>
    <li class="submenu {{ Route::is('kelasKategori*') ? 'active' : '' }}{{ Route::is('kelasKursus*') ? 'active' : '' }}{{ Route::is('fasilitas*') ? 'active' : '' }}">
      <a href="#"><i class="icon icon-th-list"></i> <span>Class</span></a>
      <ul>
        <li class="{{ Route::is('kelasKursus*') ? 'active' : '' }}"><a href="{{ route('kelasKursus.index')}}">Class Course</a></li>
        <li class="{{ Route::is('fasilitas*') ? 'active' : '' }}"><a href="{{ route('fasilitas.index') }}">Facility</a></li>
        <li class="{{ Route::is('kelasKategori*') ? 'active' : '' }}"><a href="{{ route('kelasKategori.index') }}">Class Category</a></li>
      </ul>
    </li>
    <li class="{{ Route::is('kontak*') ? 'active' : '' }}">
      <a href="{{ route('kontak.index') }}"><i class="icon icon-credit-card"></i> <span>Contact</span></a>
    </li>
    <li class="{{ Route::is('socmed*') ? 'active' : '' }}">
      <a href="{{ route('socmed.index') }}"><i class="icon-facebook-sign"></i> <span>Social Media</span></a>
    </li>
    <li class="submenu {{ Route::is('news*') ? 'active' : '' }}{{ Route::is('events*') ? 'active' : '' }}">
      <a href="#"><i class="icon icon-th-list"></i> <span>News & Events</span></a>
      <ul>
        <li class="{{ Route::is('news*') ? 'active' : '' }}"><a href="{{ route('news.index')}}">News</a></li>
        <li class="{{ Route::is('event*') ? 'active' : '' }}"><a href="{{ route('event.index') }}">Event</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
