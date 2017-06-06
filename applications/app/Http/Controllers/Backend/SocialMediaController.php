<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SosialMedia;
use App\Models\LogAkses;

use DB;
use Auth;
use Image;
use Validator;

class SocialMediaController extends Controller
{

    public function index()
    {
        $getSocmed = SosialMedia::get();

        return view('backend.socmed.index', compact('getSocmed'));
    }

    public function tambah()
    {

        return view('backend.socmed.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'nama_sosmed.required' => 'This field is required.',
          'nama_sosmed.unique' => 'This social media already taken.',
          'link_url.url'  => 'Url required',
          'link_url.required' => 'This field is required.'
        ];

        $validator = Validator::make($request->all(), [
          'nama_sosmed' => 'required|max:25|unique:amd_sosial_media',
          'link_url'  => 'required|url',
        ], $message);

        if($validator->fails()){
          return redirect()->route('socmed.tambah')->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $save = New SosialMedia;
        $save->nama_sosmed = $request->nama_sosmed;
        $save->link_url = $request->link_url;
        $save->flag_publish = $flag_publish;
        $save->actor = auth()->guard('admin')->id();;
        $save->save();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();;
        $log->aksi = 'Adding New Social Media '.$request->nama_sosmed;
        $log->save();

        return redirect()->route('socmed.index')->with('berhasil', 'Your data has been successfully saved.');
    }

    public function ubah($id)
    {
        $getSocmed = SosialMedia::find($id);

        if(!$getSocmed){
          return view('backend.errors.404');
        }

        return view('backend.socmed.ubah', compact('getSocmed'));
    }

    public function edit(Request $request)
    {
        $message = [
          'nama_sosmed.required' => 'This field is required.',
          'nama_sosmed.unique' => 'This social media already taken.',
          'link_url.url'  => 'Url required',
          'link_url.required' => 'This field is required.'
        ];

        $validator = Validator::make($request->all(), [
          'nama_sosmed' => 'required|max:25|unique:amd_sosial_media,nama_sosmed,'.$request->id,
          'link_url'  => 'required|url',
        ], $message);


        if($validator->fails()){
          return redirect()->route('socmed.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $save = SosialMedia::find($request->id);
        $save->nama_sosmed = $request->nama_sosmed;
        $save->link_url = $request->link_url;
        $save->flag_publish = $flag_publish;
        $save->actor = auth()->guard('admin')->id();;
        $save->update();

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();;
        $log->aksi = 'Edit Data Social Media '.$request->nama_sosmed;
        $log->save();

        return redirect()->route('socmed.index')->with('berhasil', 'Your data has been successfully updated.');


    }

    public function publish($id)
    {
        $set = SosialMedia::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Unpublish Data Social Media '.$set->nama_sosmed;
          $log->save();

          return redirect()->route('socmed.index')->with('berhasil', 'Successfully unpublished '.$set->nama_sosmed);
        }else{
          $set->flag_publish = 1;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Publish Data Social Media '.$set->nama_sosmed;
          $log->save();

          return redirect()->route('socmed.index')->with('berhasil', 'Successfully published '.$set->nama_sosmed);
        }
    }
}
