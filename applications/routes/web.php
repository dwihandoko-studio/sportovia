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

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin/dashboard', function(){
  return view('backend.dashboard.index');
})->name('dashboard');

// Kontak
Route::get('admin/kontak', 'Backend\KontakController@index')->name('kontak.index');
Route::get('admin/kontak/tambah', 'Backend\KontakController@tambah')->name('kontak.tambah');
Route::post('admin/kontak', 'Backend\KontakController@store')->name('kontak.store');
Route::get('admin/kontak/ubah/{id}', 'Backend\KontakController@ubah')->name('kontak.ubah');
Route::post('admin/kontak/ubah', 'Backend\KontakController@edit')->name('kontak.edit');


//----------------------- BACKEND -----------------------//
Route::group(['middleware' => ['isAdministrator']], function () {
  Route::get('admin/login');
});
//----------------------- BACKEND -----------------------//



//-------------------- FRONT END MEMBER ----------------//
Route::group(['middleware' => ['isMember']], function(){

});
