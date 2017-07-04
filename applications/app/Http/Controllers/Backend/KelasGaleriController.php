<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KelasGaleri;
use App\Models\Kelas;
use App\Models\LogAkses;

use Auth;
use Input;
use Validator;
use DB;
use File;

class KelasGaleriController extends Controller
{

    public function index($id)
    {
        $getGaleri = KelasGaleri::where('id_kelas', $id)->get();
        $id_kelas = $id;

        return view('backend.kelasGaleri.index', compact('getGaleri', 'id_kelas'));
    }

    public function store(Request $request)
    {
        $message = [
          'id_kelas.required' => 'This field is required.',
          'img_url.*.image' => 'Format not supported.',
          'img_url.*.max' => 'File Size Too Big. Max 4Mb each photo',
          'img_url.*.dimensions' => 'Pixel max 1800px x 1000px each photo.',
        ];

        $validator = Validator::make($request->all(), [
          'id_kelas' => 'required',
          'img_url.*'  => 'image|max:4000|mimes:jpeg,bmp,png|dimensions:max_width=1800,max_height=1000',
        ], $message);


        if($validator->fails()){
          return redirect()->route('kelasGaleri.index', ['id' => $request->id_kelas])->withErrors($validator)->withInput();
        }

        if($request->hasFile('img_url')){
          DB::transaction(function() use($request){
            $pathUpload = 'amadeo/images/gallery/';
            $kelas = Kelas::find($request->id_kelas);

            foreach($request->file('img_url') as $file10_ )
            {
              $salt = rand(1000,9999);
              $file10 = $kelas->nama_kelas.' - '.$salt.' - '. $file10_->getClientOriginalName();
              $file10_->move($pathUpload, $file10);

              $save = New KelasGaleri;
              $save->id_kelas = $request->id_kelas;
              $save->img_url = $file10;
              $save->img_alt = 'Sportopia - '.$file10;
              $save->save();
            }

            $log = new LogAkses;
            $log->actor = auth()->guard('admin')->id();
            $log->aksi = 'Upload New Image Gallery on '.$kelas->nama_kelas;
            $log->save();
          });

        }

        return redirect()->route('kelasGaleri.index', ['id' => $request->id_kelas])->with('berhasil', 'Your data has been successfully saved.');
    }

    public function delete($id)
    {
        $getImage = KelasGaleri::find($id);

        if(!$getImage){
          return view('backend.errors.404');
        }

        DB::transaction(function() use($getImage){
          File::delete('amadeo/images/gallery/' .$getImage->img_url);
          $getImage->delete();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Delete Image Gallery '.$getImage->img_url;
          $log->save();
        });

        return redirect()->route('kelasGaleri.index', ['id' => $getImage->id_kelas])->with('berhasil', 'Your image has been successfully deleted.');
    }
}
