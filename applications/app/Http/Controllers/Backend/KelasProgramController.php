<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KelasProgram;
use App\Models\KelasKategori;
use App\Models\Kelas;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class KelasProgramController extends Controller
{
    public function index()
    {
        $getKelasProgram = KelasProgram::get();

        return view('backend.kelasProgram.index', compact('getKelasProgram'));
    }

    public function tambah()
    {
        $getKelasProgram = KelasProgram::count();

        if($getKelasProgram < 2){
          return view('backend.kelasProgram.tambah');
        }else{
          return redirect()->route('kelasProgram.index')->with('berhasil', 'This is Maximun for Class Program');
        }
    }

    public function store(Request $request)
    {
        $message = [
          'program_kelas.required' => 'This field is required.',
          'program_kelas.unique' => 'This class category already taken.',
          'quotes_program.required' => 'This field is required.',
          'quotes_program.max' => 'Too long.',
          'deskripsi_program.required' => 'This field is required.',
          'deskripsi_program.max' => 'Too long.',
          'img_banner.image' => 'Format not supported.',
          'img_banner.required' => 'This field is required.',
          'img_banner.max' => 'File Size Too Big.',
          'img_banner.dimensions' => 'Pixel max 200px x 200px.',
          'img_thumb.image' => 'Format not supported.',
          'img_thumb.required' => 'This field is required.',
          'img_thumb.max' => 'File Size Too Big.',
          'img_thumb.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'program_kelas' => 'required|max:25|unique:amd_kelas_program',
          'quotes_program' => 'required|max:125',
          'deskripsi_program'  => 'required|max:250',
          'img_banner'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=500,max_height=500',
          'img_thumb'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=300,max_height=300'
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasProgram.tambah')->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image_banner = $request->file('img_banner');
        $img_url_banner = 'sportopia-'.str_slug($request->program_kelas,'-'). '-banner.' . $image_banner->getClientOriginalExtension();
        Image::make($image_banner)->save('amadeo/images/class/'. $img_url_banner);

        $image_thumb = $request->file('img_thumb');
        $img_url_thumb = 'sportopia-'.str_slug($request->program_kelas,'-'). '-thumb.' . $image_thumb->getClientOriginalExtension();
        Image::make($image_thumb)->save('amadeo/images/class/'. $img_url_thumb);

        $save = New KelasProgram;
        $save->program_kelas = $request->program_kelas;
        $save->quotes_program = nl2br($request->quotes_program);
        $save->deskripsi_program = nl2br($request->deskripsi_program);
        $save->img_banner = $img_url_banner;
        $save->img_banner_alt = 'sportopia-'.str_slug($request->program_kelas,'-').'-banner';
        $save->img_thumb = $img_url_thumb;
        $save->img_thumb_alt = 'sportopia-'.str_slug($request->program_kelas,'-').'-thumb';
        $save->flag_publish = $flag_publish;
        $save->slug = str_slug($request->program_kelas,'-');
        $save->actor = auth()->guard('admin')->id();
        $save->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Create New Class Program '.$request->program_kelas;
        $log->save();


        return redirect()->route('kelasProgram.index')->with('berhasil', 'Your data has been successfully saved.');

    }


    public function ubah($id)
    {
        $get = kelasProgram::find($id);

        if(!$get){
          return view('backend.errors.404');
        }

        return view('backend.kelasProgram.ubah', compact('get'));
    }

    public function edit(Request $request)
    {
        $message = [
          'program_kelas.required' => 'This field is required.',
          'program_kelas.unique' => 'This class category already taken.',
          'quotes_program.required' => 'This field is required.',
          'quotes_program.max' => 'Too long.',
          'deskripsi_program.required' => 'This field is required.',
          'deskripsi_program.max' => 'Too long.',
          'img_banner.image' => 'Format not supported.',
          'img_banner.max' => 'File Size Too Big.',
          'img_banner.dimensions' => 'Pixel max 200px x 200px.',
          'img_thumb.image' => 'Format not supported.',
          'img_thumb.max' => 'File Size Too Big.',
          'img_thumb.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'program_kelas' => 'required|max:25|unique:amd_kelas_program,program_kelas,'.$request->id,
          'quotes_program' => 'required|max:125',
          'deskripsi_program'  => 'required|max:250',
          'img_banner'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=500,max_height=500',
          'img_thumb'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=300,max_height=300'
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasProgram.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image_banner = $request->file('img_banner');
        $image_thumb = $request->file('img_thumb');


        $update = KelasProgram::find($request->id);
        $update->program_kelas = $request->program_kelas;
        $update->quotes_program = nl2br($request->quotes_program);
        $update->deskripsi_program = nl2br($request->deskripsi_program);
        $update->flag_publish = $flag_publish;
        $update->actor = auth()->guard('admin')->id();
        $update->img_banner_alt = 'sportopia-'.str_slug($request->program_kelas,'-').'-banner';
        $update->img_thumb_alt = 'sportopia-'.str_slug($request->program_kelas,'-').'-thumb';
        if($image_banner){
          $img_url_banner = 'sportopia-'.str_slug($request->program_kelas,'-'). '-banner.' . $image_banner->getClientOriginalExtension();
          Image::make($image_banner)->save('amadeo/images/class/'. $img_url_banner);
          $update->img_banner = $img_url_banner;
        }
        if($image_thumb){
          $img_url_thumb = 'sportopia-'.str_slug($request->program_kelas,'-'). '-thumb.' . $image_thumb->getClientOriginalExtension();
          Image::make($image_thumb)->save('amadeo/images/class/'. $img_url_thumb);
          $update->img_thumb = $img_url_thumb;
        }
        $update->update();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Edit Data Class Program '.$request->program_kelas;
        $log->save();

        return redirect()->route('kelasProgram.index')->with('berhasil', 'Your data has been successfully updated.');
    }

    public function publish($id)
    {
        $set = KelasProgram::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Unpublish Data Class Program '.$set->program_kelas;
          $log->save();

          return redirect()->route('kelasProgram.index')->with('berhasil', 'Successfully unpublished '.$set->program_kelas);
        }else{
          $set->flag_publish = 1;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Publish Data Class Program '.$set->program_kelas;
          $log->save();

          return redirect()->route('kelasProgram.index')->with('berhasil', 'Successfully published '.$set->program_kelas);
        }

    }




}
