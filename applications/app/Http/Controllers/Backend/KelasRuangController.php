<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\KelasRuang;
use App\Models\LogAkses;

use Auth;
use DB;
use Validator;


class KelasRuangController extends Controller
{


    public function index()
    {
        $getRuang = KelasRuang::get();

        return view('backend.kelasRuang.index', compact('getRuang'));
    }

    public function store(Request $request)
    {
        $message = [
          'nama_kelas.required' => 'This field is required.',
          'nama_kelas.unique' => 'This class room already taken.',
          'lantai_kelas.required' => 'This field is required.',
          'kapasitas.required' => 'This field is required.',
          'kapasitas.max' => 'Too long.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_kelas' => 'required|max:25|unique:amd_kelas_ruang',
          'lantai_kelas'  => 'required',
          'kapasitas' => 'required|max:4'
        ], $message);

        if($validator->fails()){
          return redirect()->route('kelasRuang.index')->withErrors($validator)->withInput();
        }

        $save = New KelasRuang;
        $save->nama_kelas = $request->nama_kelas;
        $save->lantai_kelas = $request->lantai_kelas;
        $save->kapasitas = $request->kapasitas;
        // $save->link_cctv = $request->link_cctv;
        $save->actor = auth()->guard('admin')->id();
        $save->flag_publish = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Adding New Class Room '.$request->nama_kelas;
        $log->save();

        return redirect()->route('kelasRuang.index')->with('berhasil', 'Your data has been successfully saved.');
    }

    public function ubah($id)
    {
        $getRuang = KelasRuang::find($id);

        return $getRuang;
    }

    public function edit(Request $request)
    {
        $message = [
          'edit_nama_kelas.required' => 'This field is required.',
          'edit_nama_kelas.unique' => 'This class room already taken.',
          'edit_lantai_kelas.required' => 'This field is required.',
          'edit_kapasitas.required' => 'This field is required.',
          'edit_kapasitas.max' => 'Too long.',
        ];

        $validator = Validator::make($request->all(), [
          'edit_nama_kelas' => 'required|max:25|unique:amd_kelas_ruang,nama_kelas,'.$request->id_edit,
          'edit_lantai_kelas'  => 'required',
          'edit_kapasitas' => 'required|max:4'
        ], $message);

        if($validator->fails()){
          return redirect()->route('kelasRuang.index')->withErrors($validator)->withInput();
        }

        $update = KelasRuang::find($request->id_edit);
        $update->nama_kelas = $request->edit_nama_kelas;
        $update->lantai_kelas = $request->edit_lantai_kelas;
        $update->kapasitas = $request->edit_kapasitas;
        // $update->link_cctv = $request->edit_link_cctv;
        $update->actor = auth()->guard('admin')->id();
        $update->flag_publish = 1;
        $update->update();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Edit Data Class Room '.$request->nama_kelas;
        $log->save();

        return redirect()->route('kelasRuang.index')->with('berhasil', 'Your data has been successfully updated.');
    }

}
