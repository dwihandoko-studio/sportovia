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
    <li class="{{ Route::is('kontak*') ? 'active' : '' }}">
      <a href="{{ route('kontak.index') }}"><i class="icon icon-credit-card"></i> <span>Contact</span></a>
    </li>
    <li class="{{ Route::is('fasilitas*') ? 'active' : '' }}">
      <a href="{{ route('fasilitas.index') }}"><i class="icon icon-star"></i> <span>Facility</span></a>
    </li>
    <li class="{{ Route::is('socmed*') ? 'active' : '' }}">
      <a href="{{ route('socmed.index') }}"><i class="icon-facebook-sign"></i> <span>Social Media</span></a>
    </li>
    <li class="submenu">
      <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span></a>
      <ul>
        <li><a href="form-common.html">Basic Form</a></li>
        <li><a href="form-validation.html">Form with Validation</a></li>
        <li><a href="form-wizard.html">Form with Wizard</a></li>
      </ul>
    </li>
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->
