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
Route::get('admin/facility/add', 'Backend\FasilitasController@tambah')->name('fasilitas.tambah');
Route::post('admin/facility', 'Backend\FasilitasController@store')->name('fasilitas.store');
Route::get('admin/facility/edit/{id}', 'Backend\FasilitasController@ubah')->name('fasilitas.ubah');
Route::post('admin/facility/edit', 'Backend\FasilitasController@edit')->name('fasilitas.edit');


//----------------------- BACKEND -----------------------//
Route::group(['middleware' => ['isAdministrator']], function () {
  // Route::get('admin/login');
});
//----------------------- BACKEND -----------------------//



//-------------------- FRONT END MEMBER ----------------//
Route::group(['middleware' => ['isMember']], function(){

});

//-------------------- FRONT END ----------------//
Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');

Route::get('/about/us', 'Frontend\AboutController@us')->name('frontend.about.us');
Route::get('/about/staff', 'Frontend\AboutController@staff')->name('frontend.about.staff');

//-------------------- FRONT END MEMBER ----------------//
