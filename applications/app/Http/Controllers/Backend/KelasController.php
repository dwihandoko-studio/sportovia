<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KelasKategori;
use App\Models\Kelas;
use App\Models\Fasilitas;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class KelasController extends Controller
{


    public function index()
    {
        $getKelas = Kelas::join('amd_kelas_kategori', 'amd_kelas_kategori.id', '=', 'amd_kelas.id_kelas_kategori')
                          ->select('amd_kelas.*', 'amd_kelas_kategori.kategori_kelas')
                          ->get();

        return view('backend.kelas.index', compact('getKelas'));
    }

    public function tambah()
    {
        $getKelasKategori = KelasKategori::where('flag_publish', 1)->get();
        $getFasilitas = Fasilitas::where('flag_publish', 1)->get();


        return view('backend.kelas.tambah', compact('getKelasKategori', 'getFasilitas'));
    }

    public function store(Request $request)
    {
        $message = [
          'id_kelas_kategori.required' => 'This field is required.',
          'id_program.required' => 'This field is required.',
          'nama_kelas.required' => 'This field is required.',
          'nama_kelas.max' => 'Too long.',
          'quotes.required' => 'This field is required.',
          'quotes.max' => 'Too long.',
          'deskripsi_kelas.required' => 'This field is required.',
          'deskripsi_kelas.max' => 'Too long.',
          'fasilitas.required' => 'This field is required.',
          'img_url.image' => 'Format not supported.',
          'img_url.required' => 'This field is required.',
          'img_url.max' => 'File Size Too Big.',
          'img_url.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'id_kelas_kategori' => 'required',
          'id_program' => 'required',
          'nama_kelas'  => 'required|max:25',
          'quotes'  => 'required|max:75',
          'fasilitas' =>  'required',
          'deskripsi_kelas'  => 'required|max:250',
          'img_url'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=373,max_height=605',
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasKursus.tambah')->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        if($request->id_program == 1){
          $program = 'children';
        }else{
          $program = 'regular';
        }

        $fasilitas = implode(',', $request->fasilitas);

        $image = $request->file('img_url');
        $img_url = 'sportopia-'.$program.'-'.str_slug($request->nama_kelas,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('amadeo/images/class/'. $img_url);

        $save = New Kelas;
        $save->nama_kelas = $request->nama_kelas;
        $save->quotes = $request->quotes;
        $save->id_kelas_kategori = $request->id_kelas_kategori;
        $save->id_program = $request->id_program;
        $save->deskripsi_kelas = nl2br($request->deskripsi_kelas);
        $save->img_url = $img_url;
        $save->img_alt = 'sportopia-'.$program.'-'.str_slug($request->nama_kelas,'-');
        $save->fasilitas  = $fasilitas;
        $save->video_url  = $request->video_url;
        $save->flag_publish = $flag_publish;
        $save->slug = str_slug($request->nama_kelas,'-');
        $save->actor = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Create New Class Course '.$request->nama_kelas;
        $log->save();


        return redirect()->route('kelasKursus.index')->with('berhasil', 'Your data has been successfully saved.');

    }

    public function lihat($id)
    {
        $get = Kelas::find($id);


        if(!$get){
          return view('backend.errors.404');
        }

        return view('backend.kelas.lihat', compact('get'));
    }

    public function ubah($id)
    {
        $get = Kelas::find($id);

        if(!$get){
          return view('backend.errors.404');
        }

        $getKelasKategori = KelasKategori::where('flag_publish', 1)->get();
        $getFasilitas = Fasilitas::where('flag_publish', 1)->get();

        return view('backend.kelas.ubah', compact('get', 'getKelasKategori', 'getFasilitas'));
    }

    public function edit(Request $request)
    {
        $message = [
          'id_kelas_kategori.required' => 'This field is required.',
          'id_program.required' => 'This field is required.',
          'nama_kelas.required' => 'This field is required.',
          'nama_kelas.max' => 'Too long.',
          'quotes.required' => 'This field is required.',
          'quotes.max' => 'Too long.',
          'deskripsi_kelas.required' => 'This field is required.',
          'deskripsi_kelas.max' => 'Too long.',
          'fasilitas.required' => 'This field is required.',
          'img_url.image' => 'Format not supported.',
          'img_url.max' => 'File Size Too Big.',
          'img_url.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'id_kelas_kategori' => 'required',
          'id_program' => 'required',
          'nama_kelas'  => 'required|max:25',
          'quotes'  => 'required|max:75',
          'fasilitas' =>  'required',
          'deskripsi_kelas'  => 'required|max:250',
          'img_url'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=373,max_height=605',
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasKursus.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        if($request->id_program == 1){
          $program = 'children';
        }else{
          $program = 'regular';
        }

        $fasilitas = implode(',', $request->fasilitas);

        $image = $request->file('img_url');

        $update = Kelas::find($request->id);
        $update->id_kelas_kategori = $request->id_kelas_kategori;
        $update->id_program = $request->id_program;
        $update->nama_kelas = $request->nama_kelas;
        $update->quotes = $request->quotes;
        $update->deskripsi_kelas = nl2br($request->deskripsi_kelas);
        $update->fasilitas = $fasilitas;
        $update->video_url = $request->video_url;
        $update->flag_publish = $flag_publish;
        $update->actor = 1;
        $update->slug = str_slug($request->nama_kelas,'-');
        $update->img_alt = 'sportopia-'.$program.'-'.str_slug($request->nama_kelas,'-');
        if($image){
          $img_url = 'sportopia-'.$program.'-'.str_slug($request->nama_kelas,'-'). '-banner.' . $image->getClientOriginalExtension();
          Image::make($image)->save('amadeo/images/class/'. $img_url);
          $update->img_url = $img_url;
        }
        $update->update();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Edit Data Class Course '.$request->nama_kelas;
        $log->save();

        return redirect()->route('kelasKursus.index')->with('berhasil', 'Your data has been successfully updated.');
    }

    public function publish($id)
    {
        $set = Kelas::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          return redirect()->route('kelasKursus.index')->with('berhasil', 'Successfully unpublished '.$set->nama_kelas);
        }else{
          $set->flag_publish = 1;
          $set->update();

          return redirect()->route('kelasKursus.index')->with('berhasil', 'Successfully published '.$set->nama_kelas);
        }

    }
}
