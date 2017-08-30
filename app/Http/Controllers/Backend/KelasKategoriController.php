<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KelasKategori;
use App\Models\Kelas;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class KelasKategoriController extends Controller
{

    public function index()
    {
        $getKelasKategori = KelasKategori::get();

        return view('backend.kelasKategori.index', compact('getKelasKategori'));
    }

    public function tambah()
    {
        $getKelasKategori = KelasKategori::count();

        if($getKelasKategori < 5){
          return view('backend.kelasKategori.tambah');
        }else{
          return redirect()->route('kelasKategori.index')->with('berhasil', 'This is Maximun for Class Category');
        }
    }

    public function store(Request $request)
    {
        $message = [
          'kategori_kelas.required' => 'This field is required.',
          'kategori_kelas.unique' => 'This class category already taken.',
          'quotes_kategori.required' => 'This field is required.',
          'quotes_kategori.max' => 'Too long.',
          'deskripsi_kategori.required' => 'This field is required.',
          'deskripsi_kategori.max' => 'Too long.',
          'img_banner.image' => 'Format not supported.',
          'img_banner.required' => 'This field is required.',
          'img_banner.max' => 'File Size Too Big.',
          'img_banner.dimensions' => 'Pixel max 1350px x 356px.',
          'img_thumb.image' => 'Format not supported.',
          'img_thumb.required' => 'This field is required.',
          'img_thumb.max' => 'File Size Too Big.',
          'img_thumb.dimensions' => 'Pixel max 248px x 437px.',
        ];

        $validator = Validator::make($request->all(), [
          'kategori_kelas' => 'required|max:25|unique:amd_kelas_kategori',
          'quotes_kategori' => 'required|max:125',
          'deskripsi_kategori'  => 'required|max:250',
          'img_banner'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=1350,max_height=360',
          'img_thumb'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=250,max_height=445'
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasKategori.tambah')->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $salt = rand(100,999);

        $image_banner = $request->file('img_banner');
        $img_url_banner = 'sportopia-'.str_slug($request->kategori_kelas,'-'). '-banner-'.$salt.'.'. $image_banner->getClientOriginalExtension();
        Image::make($image_banner)->save('amadeo/images/class/'. $img_url_banner);

        $image_thumb = $request->file('img_thumb');
        $img_url_thumb = 'sportopia-'.str_slug($request->kategori_kelas,'-'). '-thumb-'.$salt.'.'. $image_thumb->getClientOriginalExtension();
        Image::make($image_thumb)->save('amadeo/images/class/'. $img_url_thumb);

        $save = New KelasKategori;
        $save->kategori_kelas = $request->kategori_kelas;
        $save->quotes_kategori = nl2br($request->quotes_kategori);
        $save->deskripsi_kategori = nl2br($request->deskripsi_kategori);
        $save->img_banner = $img_url_banner;
        $save->img_banner_alt = 'sportopia-'.str_slug($request->kategori_kelas,'-').'-banner';
        $save->img_thumb = $img_url_thumb;
        $save->img_thumb_alt = 'sportopia-'.str_slug($request->kategori_kelas,'-').'-thumb';
        $save->flag_publish = $flag_publish;
        $save->slug = str_slug($request->kategori_kelas,'-');
        $save->actor = auth()->guard('admin')->id();
        $save->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Create New Class Category '.$request->kategori_kelas;
        $log->save();


        return redirect()->route('kelasKategori.index')->with('berhasil', 'Your data has been successfully saved.');

    }

    public function ubah($id)
    {
        $get = kelasKategori::find($id);

        if(!$get){
          return view('backend.errors.404');
        }

        return view('backend.kelasKategori.ubah', compact('get'));
    }

    public function edit(Request $request)
    {
        $message = [
          'kategori_kelas.required' => 'This field is required.',
          'kategori_kelas.unique' => 'This class category already taken.',
          'quotes_kategori.required' => 'This field is required.',
          'quotes_kategori.max' => 'Too long.',
          'deskripsi_kategori.required' => 'This field is required.',
          'deskripsi_kategori.max' => 'Too long.',
          'img_banner.image' => 'Format not supported.',
          'img_banner.max' => 'File Size Too Big.',
          'img_banner.dimensions' => 'Pixel max 1350px x 356px.',
          'img_thumb.image' => 'Format not supported.',
          'img_thumb.max' => 'File Size Too Big.',
          'img_thumb.dimensions' => 'Pixel max 248px x 437px.',
        ];

        $validator = Validator::make($request->all(), [
          'kategori_kelas' => 'required|max:25|unique:amd_kelas_kategori,kategori_kelas,'.$request->id,
          'quotes_kategori' => 'required|max:125',
          'deskripsi_kategori'  => 'required|max:250',
          'img_banner'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=1350,max_height=360',
          'img_thumb'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=250,max_height=445'
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasKategori.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image_banner = $request->file('img_banner');
        $image_thumb = $request->file('img_thumb');

        $salt = rand(100,999);

        $update = KelasKategori::find($request->id);
        $update->kategori_kelas = $request->kategori_kelas;
        $update->quotes_kategori = nl2br($request->quotes_kategori);
        $update->deskripsi_kategori = nl2br($request->deskripsi_kategori);
        $update->flag_publish = $flag_publish;
        $update->actor = auth()->guard('admin')->id();
        $update->img_banner_alt = 'sportopia-'.str_slug($request->kategori_kelas,'-').'-banner';
        $update->img_thumb_alt = 'sportopia-'.str_slug($request->kategori_kelas,'-').'-thumb';
        if($image_banner){
          $img_url_banner = 'sportopia-'.str_slug($request->kategori_kelas,'-'). '-banner-'.$salt.'.'. $image_banner->getClientOriginalExtension();
          Image::make($image_banner)->save('amadeo/images/class/'. $img_url_banner);
          $update->img_banner = $img_url_banner;
        }
        if($image_thumb){
          $img_url_thumb = 'sportopia-'.str_slug($request->kategori_kelas,'-'). '-thumb-'.$salt.'.'. $image_thumb->getClientOriginalExtension();
          Image::make($image_thumb)->save('amadeo/images/class/'. $img_url_thumb);
          $update->img_thumb = $img_url_thumb;
        }
        $update->update();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Edit Data Class Category '.$request->kategori_kelas;
        $log->save();

        return redirect()->route('kelasKategori.index')->with('berhasil', 'Your data has been successfully updated.');
    }

    public function publish($id)
    {
        $set = KelasKategori::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Unpublish Data Class Category '.$set->kategori_kelas;
          $log->save();

          return redirect()->route('kelasKategori.index')->with('berhasil', 'Successfully unpublished '.$set->kategori_kelas);
        }else{
          $set->flag_publish = 1;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Publish Data Class Category '.$set->kategori_kelas;
          $log->save();

          return redirect()->route('kelasKategori.index')->with('berhasil', 'Successfully published '.$set->kategori_kelas);
        }

    }
}
