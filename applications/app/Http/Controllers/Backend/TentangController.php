<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class TentangController extends Controller
{


    public function index()
    {
        $getTentang = Tentang::get();

        return view('backend.tentang.index', compact('getTentang'));
    }

    public function tambah()
    {

        return view('backend.tentang.tambah');
    }

    public function store(Request $request)
    {
      $message = [
        'deskripsi_tentang.required' => 'Wajib di isi',
        'deskripsi_tentang.max' => 'Terlalu Panjang, Maks 350 Katakter',
        'img_visi.required' => 'Wajib di isi',
        'img_visi.image' => 'Format Gambar Tidak Sesuai',
        'img_visi.max' => 'File Size Terlalu Besar',
        'img_visi.dimensions' => 'Ukuran yg di terima 100px x 100px',
        'img_misi.required' => 'Wajib di isi',
        'img_misi.image' => 'Format Gambar Tidak Sesuai',
        'img_misi.max' => 'File Size Terlalu Besar',
        'img_misi.dimensions' => 'Ukuran yg di terima 100px x 100px',
        'visi.required' => 'Wajib di isi',
        'misi.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'deskripsi_tentang' => 'required|max:350',
        'img_visi' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=2443,max_height=2418',
        'img_misi' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=2443,max_height=2418',
        'visi' => 'required',
        'misi' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('tentang.tambah')->withErrors($validator)->withInput();
      }



      DB::transaction(function() use($request){

        $image_visi = $request->file('img_visi');
        $img_url_visi = 'vision-backgroud.' . $image_visi->getClientOriginalExtension();
        Image::make($image_visi)->save('amadeo/images/tentang/'. $img_url_visi);

        $image_misi = $request->file('img_misi');
        $img_url_misi = 'mission-backgroud.' . $image_misi->getClientOriginalExtension();
        Image::make($image_misi)->save('amadeo/images/tentang/'. $img_url_misi);


        $save = New Tentang;
        $save->deskripsi_tentang = nl2br($request->deskripsi_tentang);
        $save->img_visi = $img_url_visi;
        $save->visi = nl2br($request->visi);
        $save->img_misi = $img_url_misi;
        $save->misi = nl2br($request->misi);
        $save->actor = 1;
        $save->save();

        $log = New LogAkses;
        $log->actor = 1;
        $log->aksi  = 'Adding About Data';
        $log->save();

      });

      return redirect()->route('tentang.index')->with('berhasil', 'Your data has been successfully saved.');

    }

    public function ubah($id)
    {
      $getTentang = Tentang::find($id);

      if(!$getTentang){
        return view('backend.errors.404');
      }

      return view('backend.tentang.ubah', compact('getTentang'));

    }

    public function edit(Request $request)
    {
      $message = [
        'deskripsi_tentang.required' => 'Wajib di isi',
        'deskripsi_tentang.max' => 'Terlalu Panjang, Maks 350 Katakter',
        'img_visi.image' => 'Format Gambar Tidak Sesuai',
        'img_visi.max' => 'File Size Terlalu Besar',
        'img_visi.dimensions' => 'Ukuran yg di terima 100px x 100px',
        'img_misi.image' => 'Format Gambar Tidak Sesuai',
        'img_misi.max' => 'File Size Terlalu Besar',
        'img_misi.dimensions' => 'Ukuran yg di terima 100px x 100px',
        'visi.required' => 'Wajib di isi',
        'misi.required' => 'Wajib di isi',
      ];

      $validator = Validator::make($request->all(), [
        'deskripsi_tentang' => 'required|max:350',
        'img_visi' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=2443,max_height=2418',
        'img_misi' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=2443,max_height=2418',
        'visi' => 'required',
        'misi' => 'required'
      ], $message);

      if($validator->fails())
      {
        return redirect()->route('tentang.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
      }


      DB::transaction(function() use($request){

        $image_visi = $request->file('img_visi');
        $image_misi = $request->file('img_misi');


        $update = Tentang::find($request->id);
        $update->deskripsi_tentang = nl2br($request->deskripsi_tentang);
        $update->visi = nl2br($request->visi);
        $update->misi = nl2br($request->misi);
        $update->actor = 1;
        if(!$image_visi && !$image_misi){
          $update->update();
        }elseif($image_misi && $image_visi){
          $img_url_visi = 'vision-backgroud.' . $image_visi->getClientOriginalExtension();
          Image::make($image_visi)->save('amadeo/images/tentang/'. $img_url_visi);

          $img_url_misi = 'mission-backgroud.' . $image_misi->getClientOriginalExtension();
          Image::make($image_misi)->save('amadeo/images/tentang/'. $img_url_misi);

          $update->img_visi = $img_url_visi;
          $update->img_misi = $img_url_misi;
          $update->update();
        }elseif($image_misi){
          $img_url_misi = 'mission-backgroud.' . $image_misi->getClientOriginalExtension();
          Image::make($image_misi)->save('amadeo/images/tentang/'. $img_url_misi);

          $update->img_misi = $img_url_misi;
          $update->update();
        }elseif($image_visi){
          $img_url_visi = 'vision-backgroud.' . $image_visi->getClientOriginalExtension();
          Image::make($image_visi)->save('amadeo/images/tentang/'. $img_url_visi);

          $update->img_visi = $img_url_visi;
          $update->update();
        }

        $log = New LogAkses;
        $log->actor = 1;
        $log->aksi  = 'Edit About Data';
        $log->save();

      });

      return redirect()->route('tentang.index')->with('berhasil', 'Your data has been successfully updated.');


    }
}
