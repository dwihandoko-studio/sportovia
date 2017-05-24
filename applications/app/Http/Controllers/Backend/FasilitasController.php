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
        $save->actor = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Adding New Facility';
        $log->save();

        return redirect()->route('fasilitas.index')->with('berhasil', 'Your data has been successfully saved.');
    }
}
