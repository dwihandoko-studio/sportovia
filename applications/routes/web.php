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


Route::get('admin/dashboard', function(){
  return view('backend.dashboard.index');
})->name('dashboard');

Route::get('admin/login', function(){
  return view('backend.auth.login');
});

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
Route::get('admin/facility', 'Backend\FasilitasController@index')->name('fasilitas.index');
Route::post('admin/facility', 'Backend\FasilitasController@store')->name('fasilitas.store');
Route::get('admin/facility/edit/{id}', 'Backend\FasilitasController@ubah')->name('fasilitas.ubah');
Route::post('admin/facility/edit', 'Backend\FasilitasController@edit')->name('fasilitas.edit');
Route::get('admin/facility/publish/{id}', 'Backend\FasilitasController@publish')->name('fasilitas.publish');

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

Route::get('admin/social-media', 'Backend\SocialMediaController@index')->name('socmed.index');
Route::get('admin/social-media/add', 'Backend\SocialMediaController@tambah')->name('socmed.tambah');
Route::post('admin/social-media', 'Backend\SocialMediaController@store')->name('socmed.store');
Route::get('admin/social-media/edit/{id}', 'Backend\SocialMediaController@ubah')->name('socmed.ubah');
Route::post('admin/social-media/edit', 'Backend\SocialMediaController@edit')->name('socmed.edit');
Route::get('admin/social-media/publish/{id}', 'Backend\SocialMediaController@publish')->name('socmed.publish');


//----------------------- BACKEND -----------------------//
Route::group(['middleware' => ['isAdministrator']], function () {
  // Route::get('admin/login');
});
//----------------------- BACKEND -----------------------//



//-------------------- FRONT END MEMBER ----------------//
Route::group(['middleware' => ['isMember']], function(){

});

//-------------------- FRONT END ----------------//
Route::get('/', 'Frontend\HomeController@index')
	->name('frontend.home');

Route::get('/reguler-class', 'Frontend\RegulerClassController@index')
	->name('frontend.reguler.index');
Route::get('/reguler-class/{slug}', 'Frontend\RegulerClassController@view')
	->name('frontend.reguler.view');

Route::get('/children-class', 'Frontend\ChildrenClassController@index')
	->name('frontend.children.index');
Route::get('/children-class/{slug}', 'Frontend\ChildrenClassController@view')
	->name('frontend.children.view');

Route::get('/about/us', 'Frontend\AboutController@us')
	->name('frontend.about.us');
Route::get('/about/staff', 'Frontend\AboutController@staff')
	->name('frontend.about.staff');

Route::get('/contact', 'Frontend\ContactController@index')
	->name('frontend.contact');

Route::get('/art', 'Frontend\ArtController@index')
	->name('frontend.art.index');
Route::get('/art/{slug}', 'Frontend\ArtController@view')
	->name('frontend.art.view');

Route::get('/education', 'Frontend\EducationController@index')
	->name('frontend.education.index');
Route::get('/education/{slug}', 'Frontend\EducationController@view')
	->name('frontend.education.view');

Route::get('/games', 'Frontend\GamesController@index')
	->name('frontend.games.index');
Route::get('/games/{slug}', 'Frontend\GamesController@view')
	->name('frontend.games.view');

Route::get('/news-event', 'Frontend\NewsEventController@index')
	->name('frontend.news-event.index');
Route::get('/news-event/{slug}', 'Frontend\NewsEventController@view')
	->name('frontend.news-event.view');

Route::get('/sport', 'Frontend\SportController@index')
	->name('frontend.sport.index');
Route::get('/sport/{slug}', 'Frontend\SportController@view')
	->name('frontend.sport.view');

//-------------------- FRONT END MEMBER ----------------//
