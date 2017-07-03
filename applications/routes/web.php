<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Admin Login
Route::get('admin/login', 'Backend\Auth\LoginController@getLoginForm')->name('login.admin.form');
Route::post('admin/login/proses', 'Backend\Auth\LoginController@authenticate')->name('login.admin.post');

Route::get('admin/verify/{confirmation_code}', 'Backend\UserController@verify')->name('userAdmin.verify');
Route::post('admin/verify', 'Backend\UserController@store')->name('userAdmin.store');


//----------------------- BACKEND -----------------------//
Route::group(['middleware' => ['admin']], function () {

  Route::post('admin/logout', 'Backend\Auth\LoginController@getLogout');

  // Dashboard
  Route::get('admin/dashboard', 'Backend\DashboardController@index')->name('dashboard');

  // Contact
  Route::get('admin/contact', 'Backend\KontakController@index')->name('kontak.index');
  Route::get('admin/contact/add', 'Backend\KontakController@tambah')->name('kontak.tambah');
  Route::post('admin/contact', 'Backend\KontakController@store')->name('kontak.store');
  Route::get('admin/contact/edit/{id}', 'Backend\KontakController@ubah')->name('kontak.ubah');
  Route::post('admin/contact/edit', 'Backend\KontakController@edit')->name('kontak.edit');

  // About
  Route::get('admin/about', 'Backend\TentangController@index')->name('tentang.index');
  Route::get('admin/about/add', 'Backend\TentangController@tambah')->name('tentang.tambah');
  Route::post('admin/about', 'Backend\TentangController@store')->name('tentang.store');
  Route::get('admin/about/edit/{id}', 'Backend\TentangController@ubah')->name('tentang.ubah');
  Route::post('admin/about/edit', 'Backend\TentangController@edit')->name('tentang.edit');

  // Facility
  // Route::get('admin/facility', 'Backend\FasilitasController@index')->name('fasilitas.index');
  // Route::post('admin/facility', 'Backend\FasilitasController@store')->name('fasilitas.store');
  // Route::get('admin/facility/edit/{id}', 'Backend\FasilitasController@ubah')->name('fasilitas.ubah');
  // Route::post('admin/facility/edit', 'Backend\FasilitasController@edit')->name('fasilitas.edit');
  // Route::get('admin/facility/publish/{id}', 'Backend\FasilitasController@publish')->name('fasilitas.publish');

  // Staff Position
  Route::get('admin/staff-position', 'Backend\StaffController@index')->name('staff-jabatan.index');
  Route::post('admin/staff-position', 'Backend\StaffController@store')->name('staff-jabatan.store');
  Route::get('admin/staff-position/edit/{id}', 'Backend\StaffController@ubah')->name('staff-jabatan.ubah');
  Route::post('admin/staff-position/edit', 'Backend\StaffController@edit')->name('staff-jabatan.edit');
  Route::get('admin/staff-position/publish/{id}', 'Backend\StaffController@publish')->name('staff-jabatan.publish');

  // Staff Position
  Route::get('admin/staff', 'Backend\StaffController@staffIndex')->name('pegawai.index');
  Route::get('admin/staff/add', 'Backend\StaffController@staffTambah')->name('pegawai.tambah');
  Route::post('admin/staff', 'Backend\StaffController@staffStore')->name('pegawai.store');
  Route::get('admin/staff/edit/{id}', 'Backend\StaffController@staffUbah')->name('pegawai.ubah');
  Route::post('admin/staff/edit', 'Backend\StaffController@staffEdit')->name('pegawai.edit');
  Route::get('admin/staff/publish/{id}', 'Backend\StaffController@staffPublish')->name('pegawai.publish');

  // Social Media
  Route::get('admin/social-media', 'Backend\SocialMediaController@index')->name('socmed.index');
  Route::get('admin/social-media/add', 'Backend\SocialMediaController@tambah')->name('socmed.tambah');
  Route::post('admin/social-media', 'Backend\SocialMediaController@store')->name('socmed.store');
  Route::get('admin/social-media/edit/{id}', 'Backend\SocialMediaController@ubah')->name('socmed.ubah');
  Route::post('admin/social-media/edit', 'Backend\SocialMediaController@edit')->name('socmed.edit');
  Route::get('admin/social-media/publish/{id}', 'Backend\SocialMediaController@publish')->name('socmed.publish');

  // Class Category
  Route::get('admin/class-category', 'Backend\KelasKategoriController@index')->name('kelasKategori.index');
  Route::get('admin/class-category/add', 'Backend\KelasKategoriController@tambah')->name('kelasKategori.tambah');
  Route::post('admin/class-category', 'Backend\KelasKategoriController@store')->name('kelasKategori.store');
  Route::get('admin/class-category/edit/{id}', 'Backend\KelasKategoriController@ubah')->name('kelasKategori.ubah');
  Route::post('admin/class-category/edit', 'Backend\KelasKategoriController@edit')->name('kelasKategori.edit');
  Route::get('admin/class-category/publish/{id}', 'Backend\KelasKategoriController@publish')->name('kelasKategori.publish');

  // Class Program
  Route::get('admin/class-program', 'Backend\KelasProgramController@index')->name('kelasProgram.index');
  Route::get('admin/class-program/add', 'Backend\KelasProgramController@tambah')->name('kelasProgram.tambah');
  Route::post('admin/class-program', 'Backend\KelasProgramController@store')->name('kelasProgram.store');
  Route::get('admin/class-program/edit/{id}', 'Backend\KelasProgramController@ubah')->name('kelasProgram.ubah');
  Route::post('admin/class-program/edit', 'Backend\KelasProgramController@edit')->name('kelasProgram.edit');
  Route::get('admin/class-program/publish/{id}', 'Backend\KelasProgramController@publish')->name('kelasProgram.publish');

  // Class Course
  Route::get('admin/class-course', 'Backend\KelasController@index')->name('kelasKursus.index');
  Route::get('admin/class-course/add', 'Backend\KelasController@tambah')->name('kelasKursus.tambah');
  Route::post('admin/class-course', 'Backend\KelasController@store')->name('kelasKursus.store');
  Route::get('admin/class-course/edit/{id}', 'Backend\KelasController@ubah')->name('kelasKursus.ubah');
  Route::post('admin/class-course/edit', 'Backend\KelasController@edit')->name('kelasKursus.edit');
  Route::get('admin/class-course/{id}', 'Backend\KelasController@lihat')->name('kelasKursus.lihat');
  Route::get('admin/class-course/publish/{id}', 'Backend\KelasController@publish')->name('kelasKursus.publish');
  Route::get('admin/class-course/slider/{id}', 'Backend\KelasController@slider')->name('kelasKursus.slider');

  // Class Room
  Route::get('admin/class-room', 'Backend\KelasRuangController@index')->name('kelasRuang.index');
  Route::post('admin/class-room', 'Backend\KelasRuangController@store')->name('kelasRuang.store');
  Route::get('admin/class-room/edit/{id}', 'Backend\KelasRuangController@ubah')->name('kelasRuang.ubah');
  Route::post('admin/class-room/edit', 'Backend\KelasRuangController@edit')->name('kelasRuang.edit');

  // News
  Route::get('admin/news', 'Backend\NewsController@index')->name('news.index');
  Route::get('admin/news/add', 'Backend\NewsController@tambah')->name('news.tambah');
  Route::post('admin/news', 'Backend\NewsController@store')->name('news.store');
  Route::get('admin/news/edit/{id}', 'Backend\NewsController@ubah')->name('news.ubah');
  Route::post('admin/news/edit', 'Backend\NewsController@edit')->name('news.edit');
  Route::get('admin/news/publish/{id}', 'Backend\NewsController@publish')->name('news.publish');

  // Event
  Route::get('admin/event', 'Backend\EventsController@index')->name('event.index');
  Route::get('admin/event/add', 'Backend\EventsController@tambah')->name('event.tambah');
  Route::post('admin/event', 'Backend\EventsController@store')->name('event.store');
  Route::get('admin/event/edit/{id}', 'Backend\EventsController@ubah')->name('event.ubah');
  Route::post('admin/event/edit', 'Backend\EventsController@edit')->name('event.edit');
  Route::get('admin/event/publish/{id}', 'Backend\EventsController@publish')->name('event.publish');

  // Log Akses
  Route::get('admin/log-access', 'Backend\LogAksesController@index')->name('logAkses.index');

  //User Admin
  Route::get('admin/user', 'Backend\UserController@index')->name('userAdmin.index');
  Route::post('admin/user', 'Backend\UserController@newUser')->name('userAdmin.newUser');
  Route::get('admin/user/{id}', 'Backend\UserController@reset')->name('userAdmin.reset');

  // Profile User
  Route::get('admin/profile', 'Backend\ProfileController@index')->name('profile.index');
  Route::post('admin/profile/changePassword', 'Backend\ProfileController@changePassword')->name('profile.changePassword');

  // Member
  Route::get('admin/member', 'Backend\MemberController@index')->name('member.index');
  Route::get('admin/member/add', 'Backend\MemberController@tambah')->name('member.tambah');
  Route::post('admin/member/add', 'Backend\MemberController@store')->name('member.store');
  Route::get('admin/member/edit/{id}', 'Backend\MemberController@getMember')->name('member.getMember');
  Route::post('admin/member/edit', 'Backend\MemberController@edit')->name('member.edit');
  Route::get('admin/member/schedule/{id}', 'Backend\MemberController@lihatJadwal')->name('member.lihatJadwal');
  Route::get('admin/member/shcedule/status/{id}', 'Backend\MemberController@status')->name('member.status');

  //Jadwal
  Route::get('admin/schedule', 'Backend\ScheduleController@index')->name('jadwal.index');
  Route::get('admin/schedule/{id}', 'Backend\ScheduleController@seeSchedule')->name('jadwal.seeSchedule');
  Route::get('admin/schedule/edit/{id}', 'Backend\ScheduleController@ubahSchedule')->name('jadwal.ubah.schedule');
  Route::post('admin/schedule/edit/', 'Backend\ScheduleController@editSchedule')->name('jadwal.edit.schedule');
  Route::get('admin/schedule/status/{id}', 'Backend\ScheduleController@status')->name('jadwal.status.schedule');
  Route::get('admin/schedule/class-room/{id}', 'Backend\ScheduleController@class')->name('jadwal.class');
  Route::post('admin/schedule/class-room', 'Backend\ScheduleController@classStore')->name('jadwal.classStore');
  Route::get('admin/schedule/class-member/add', 'Backend\ScheduleController@classMember')->name('jadwal.classMember');
  Route::post('admin/schedule/class-member', 'Backend\ScheduleController@classMemberStore')->name('jadwal.classMemberStore');

  // Inbox
  Route::get('admin/inbox', 'Backend\InboxController@index')->name('inbox.index');

  // Free Trial Register
  Route::get('admin/free-trial-register', 'Backend\FreeTrialController@index')->name('freetrial.index');

  // Ads Banner
  Route::get('admin/ads-banner', 'Backend\AdsBannerController@index')->name('ads.index');
  Route::post('admin/ads-banner', 'Backend\AdsBannerController@store')->name('ads.store');
  Route::get('admin/ads-banner/edit/{id}', 'Backend\AdsBannerController@ubah')->name('ads.ubah');
  Route::post('admin/ads-banner/edit', 'Backend\AdsBannerController@edit')->name('ads.edit');
  Route::get('admin/ads-banner/publish/{id}', 'Backend\AdsBannerController@publish')->name('ads.publish');

  // Facebook API
  Route::get('admin/facebook', 'Backend\FacebookController@index')->name('facebook.index');
  Route::get('admin/facebook/edit/{id}', 'Backend\FacebookController@ubah')->name('facebook.ubah');
  Route::post('admin/facebook/edit', 'Backend\FacebookController@edit')->name('facebook.edit');

  // Stream Api
  Route::get('admin/facebook/api', 'Backend\DashboardController@getFB')->name('analytics.getFB');
  Route::get('admin/google/api', 'Backend\DashboardController@getGA')->name('analytics.getGA');
});
//----------------------- BACKEND -----------------------//



//-------------------- FRONT END MEMBER ----------------//
Route::get('/member-area/login', 'Frontend\Auth\LoginController@getLoginForm')
  ->name('frontend.member.log-in');
Route::post('/member-area/proses', 'Frontend\Auth\LoginController@authenticate')
  ->name('frontend.member.post');

Route::group(['middleware' => ['user']], function(){
  Route::get('/member-area/log-out', 'Frontend\Auth\LoginController@getLogout')
    ->name('frontend.member.log-out');

  Route::get('/member-area', 'Frontend\MemberController@index')
    ->name('frontend.member.index');
    Route::get('/member-area/{slug}', 'Frontend\MemberController@view')
    ->name('frontend.member.view');
});

//-------------------- FRONT END ----------------//
Route::get('/', 'Frontend\HomeController@index')
  ->name('frontend.home');

Route::post('/store', 'Frontend\StoreController@store')
  ->name('frontend.store');
Route::post('/store/contact', 'Frontend\StoreController@storeContact')
  ->name('frontend.store.contact');

Route::get('/about/us', 'Frontend\AboutController@us')
	->name('frontend.about.us');
Route::get('/about/trainers', 'Frontend\AboutController@trainer')
	->name('frontend.about.trainers');

Route::get('/news-event', 'Frontend\NewsEventController@index')
	->name('frontend.news-event.index');
Route::get('/news-event/{slug}', 'Frontend\NewsEventController@view')
	->name('frontend.news-event.view');

Route::get('/contact', 'Frontend\ContactController@index')
	->name('frontend.contact');

Route::get('/program-class/{slug}', 'Frontend\ProgramClassController@index')
	->name('frontend.program.index');

// Sitemap
Route::get('/sitemap.xml', 'Backend\SitemapController@index')->name('sitemap.index');

Route::get('/{slug}', 'Frontend\ClassController@index')
	->name('frontend.class.index');
Route::get('/{slug}/{subslug}', 'Frontend\ClassController@view')
	->name('frontend.class.view');


//-------------------- FRONT END MEMBER ----------------//
