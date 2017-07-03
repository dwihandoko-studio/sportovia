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
    <li class="{{ Route::is('member*') ? 'active' : '' }}">
      <a href="{{ route('member.index') }}"><i class="icon icon-group"></i> <span>Member</span></a>
    </li>
    <li class="{{ Route::is('jadwal*') ? 'active' : '' }}">
      <a href="{{ route('jadwal.index') }}"><i class="icon icon-calendar"></i> <span>Schedule Course</span></a>
    </li>
    <li class="submenu {{ Route::is('kelasKategori*') ? 'active' : '' }}{{ Route::is('kelasKursus*') ? 'active' : '' }}{{ Route::is('kelasProgram*') ? 'active' : '' }}{{ Route::is('kelasRuang*') ? 'active' : '' }}">
      <a href="#"><i class="icon icon-magnet"></i> <span>Class</span></a>
      <ul>
        <li class="{{ Route::is('kelasKursus*') ? 'active' : '' }}"><a href="{{ route('kelasKursus.index')}}">Class Course</a></li>
        {{-- <li class="{{ Route::is('fasilitas*') ? 'active' : '' }}"><a href="{{ route('fasilitas.index') }}">Class Facility</a></li> --}}
        <li class="{{ Route::is('kelasKategori*') ? 'active' : '' }}"><a href="{{ route('kelasKategori.index') }}">Class Category</a></li>
        <li class="{{ Route::is('kelasProgram*') ? 'active' : '' }}"><a href="{{ route('kelasProgram.index') }}">Class Program</a></li>
        <li class="{{ Route::is('kelasRuang*') ? 'active' : '' }}"><a href="{{ route('kelasRuang.index') }}">Class Room</a></li>
      </ul>
    </li>
    <li class="submenu {{ Route::is('news*') ? 'active' : '' }}{{ Route::is('event*') ? 'active' : '' }}">
      <a href="#"><i class="icon icon-th-list"></i> <span>News & Events</span></a>
      <ul>
        <li class="{{ Route::is('news*') ? 'active' : '' }}"><a href="{{ route('news.index')}}">News</a></li>
        <li class="{{ Route::is('event*') ? 'active' : '' }}"><a href="{{ route('event.index') }}">Event</a></li>
      </ul>
    </li>
    <li class="{{ Route::is('freetrial*') ? 'active' : '' }}">
      <a href="{{ route('freetrial.index') }}"><i class="icon-book"></i> <span>Free Trial Register</span></a>
    </li>
    <li class="{{ Route::is('ads*') ? 'active' : '' }}">
      <a href="{{ route('ads.index') }}"><i class="icon-picture"></i> <span>Ads Banner</span></a>
    </li>
    <li class="{{ Route::is('socmed*') ? 'active' : '' }}">
      <a href="{{ route('socmed.index') }}"><i class="icon-facebook-sign"></i> <span>Social Media</span></a>
    </li>
    <li class="{{ Route::is('kontak*') ? 'active' : '' }}">
      <a href="{{ route('kontak.index') }}"><i class="icon icon-credit-card"></i> <span>Contact</span></a>
    </li>
    <li class="{{ Route::is('facebook*') ? 'active' : '' }}">
      <a href="{{ route('facebook.index') }}"><i class="icon icon-facebook"></i> <span>Facebook App</span></a>
    </li>
    <li class="{{ Route::is('logAkses*') ? 'active' : '' }}">
      <a href="{{ route('logAkses.index') }}"><i class="icon icon-list-ul"></i> <span>Log Access</span></a>
    </li>
    <li class="{{ Route::is('userAdmin*') ? 'active' : '' }}">
      <a href="{{ route('userAdmin.index') }}"><i class="icon icon-user"></i> <span>Users</span></a>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
