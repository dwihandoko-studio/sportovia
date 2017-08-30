<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kontak;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;

class KontakController extends Controller
{

    public function index()
    {
        $getKontak = Kontak::get();

        return view('backend.kontak.index', compact('getKontak'));
    }

    public function tambah()
    {
        return view('backend.kontak.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'marketing.required' => 'Wajib di isi',
          'email.email' => 'Format email tidak sesuai',
          'email.required' => 'Wajib di isi',
          'alamat.required' => 'Wajib di isi',
          'office.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'marketing' => 'required',
          'email' => 'required|email',
          'office' => 'required',
          'alamat' => 'required'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('kontak.tambah')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

          $kontak = Kontak::create([
            'marketing' => nl2br($request->marketing),
            'office'  => nl2br($request->office),
            'email' => $request->email,
            'alamat'  => nl2br($request->alamat),
            'actor' => auth()->guard('admin')->id()
          ]);

          $log = LogAkses::create([
            'actor' => auth()->guard('admin')->id(),
            'aksi'  => 'Adding Contact Data'
          ]);

        });

        return redirect()->route('kontak.index')->with('berhasil', 'Your data has been successfully saved.');

    }

    public function ubah($id)
    {
        $getKontak = Kontak::find($id);

        if(!$getKontak){
          return view('backend.errors.404');
        }

        return view('backend.kontak.ubah', compact('getKontak'));

    }

    public function edit(Request $request)
    {
        $message = [
          'marketing.required' => 'Wajib di isi',
          'email.email' => 'Format email tidak sesuai',
          'email.required' => 'Wajib di isi',
          'alamat.required' => 'Wajib di isi',
          'office.required' => 'Wajib di isi',
        ];

        $validator = Validator::make($request->all(), [
          'marketing' => 'required',
          'email' => 'required|email',
          'office' => 'required',
          'alamat' => 'required'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('kontak.ubah', array('id' => $request->id))->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

          $update = Kontak::find($request->id);
          $update->marketing = nl2br($request->marketing);
          $update->office = nl2br($request->office);
          $update->email = $request->email;
          $update->alamat = nl2br($request->alamat);
          $update->actor  = auth()->guard('admin')->id();
          $update->update();

          $log = LogAkses::create([
            'actor' => auth()->guard('admin')->id(),
            'aksi'  => 'Edit Contact Data'
          ]);

        });

        return redirect()->route('kontak.index')->with('berhasil', 'Your data has been successfully updated.');
    }
}
