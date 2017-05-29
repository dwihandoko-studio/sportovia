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
          'img_url.required' => 'This field is required.',
          'img_url.image' => 'Format not supported.',
          'img_url.max' => 'File Size Too Big.',
          'img_url.dimensions' => 'Pixel max 100px x 100px.',
          'link_url.url'  => 'Url required',
          'link_url.required' => 'This field is required.'
        ];

        $validator = Validator::make($request->all(), [
          'nama_sosmed' => 'required|max:25|unique:amd_sosial_media',
          'img_url'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=100,max_height=100',
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

        $image = $request->file('img_url');
        $img_url = 'sportopia-'.str_slug($request->nama_sosmed,'-'). '.' . $image->getClientOriginalExtension();
        Image::make($image)->save('amadeo/images/social/'. $img_url);


        $save = New SosialMedia;
        $save->nama_sosmed = $request->nama_sosmed;
        $save->link_url = $request->link_url;
        $save->img_url = $img_url;
        $save->flag_publish = $flag_publish;
        $save->actor = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
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
          'img_url.image' => 'Format not supported.',
          'img_url.max' => 'File Size Too Big.',
          'img_url.dimensions' => 'Pixel max 100px x 100px.',
          'link_url.url'  => 'Url required',
          'link_url.required' => 'This field is required.'
        ];

        $validator = Validator::make($request->all(), [
          'nama_sosmed' => 'required|max:25|unique:amd_sosial_media,nama_sosmed,'.$request->id,
          'img_url'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=100,max_height=100',
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

        $image = $request->file('img_url');


        $save = SosialMedia::find($request->id);
        $save->nama_sosmed = $request->nama_sosmed;
        $save->link_url = $request->link_url;
        if($image){
          $img_url = 'sportopia-'.str_slug($request->nama_sosmed,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->save('amadeo/images/social/'. $img_url);
          $save->img_url = $img_url;
        }
        $save->flag_publish = $flag_publish;
        $save->actor = 1;
        $save->update();

        $log = new LogAkses;
        $log->actor = 1;
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

          return redirect()->route('socmed.index')->with('berhasil', 'Successfully unpublished '.$set->nama_sosmed);
        }else{
          $set->flag_publish = 1;
          $set->update();

          return redirect()->route('socmed.index')->with('berhasil', 'Successfully published '.$set->nama_sosmed);
        }
    }
}
