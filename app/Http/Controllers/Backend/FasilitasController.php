<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Fasilitas;
use App\Models\LogAkses;

use DB;
use Auth;
use Image;
use Validator;

class FasilitasController extends Controller
{


    public function index()
    {
        $getFasilitas = Fasilitas::get();

        return view('backend.fasilitas.index', compact('getFasilitas'));
    }

    public function store(Request $request)
    {
        $message = [
          'nama_fasilitas.required' => 'This field is required.',
          'nama_fasilitas.unique' => 'This facility already taken.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_fasilitas' => 'required|max:25|unique:amd_fasilitas'
        ], $message);

        if($validator->fails()){
          return redirect()->route('fasilitas.index')->withErrors($validator)->withInput();
        }

        $save = New Fasilitas;
        $save->nama_fasilitas = $request->nama_fasilitas;
        $save->actor = auth()->guard('admin')->id();
        $save->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Adding New Facility '.$request->nama_fasilitas;
        $log->save();

        return redirect()->route('fasilitas.index')->with('berhasil', 'Your data has been successfully saved.');
    }

    public function ubah($id)
    {
        $getFasilitas = Fasilitas::find($id);

        return $getFasilitas;
    }

    public function edit(Request $request)
    {
      $message = [
        'edit_nama_fasilitas.required' => 'This field is required.',
        'edit_nama_fasilitas.unique' => 'This facility already taken.',
      ];

      $validator = Validator::make($request->all(), [
        'edit_nama_fasilitas' => 'required|max:25|unique:amd_fasilitas,nama_fasilitas,'.$request->id_edit,
      ], $message);

      if($validator->fails()){
        return redirect()->route('fasilitas.index')->withErrors($validator)->withInput();
      }

      $update = Fasilitas::find($request->id_edit);
      $update->nama_fasilitas = $request->edit_nama_fasilitas;
      $update->actor = auth()->guard('admin')->id();
      $update->update();

      $log = new LogAkses;
      $log->actor = auth()->guard('admin')->id();
      $log->aksi = 'Edit Facility '.$request->edit_nama_fasilitas;
      $log->save();

      return redirect()->route('fasilitas.index')->with('berhasil', 'Your data has been successfully updated.');

    }

    public function publish($id)
    {
        $set = Fasilitas::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Unpublish Data Facility '.$set->nama_fasilitas;
          $log->save();

          return redirect()->route('fasilitas.index')->with('berhasil', 'Successfully unpublished '.$set->nama_fasilitas);
        }else{
          $set->flag_publish = 1;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Publish Data Facility '.$set->nama_fasilitas;
          $log->save();

          return redirect()->route('fasilitas.index')->with('berhasil', 'Successfully published '.$set->nama_fasilitas);
        }
    }
}
