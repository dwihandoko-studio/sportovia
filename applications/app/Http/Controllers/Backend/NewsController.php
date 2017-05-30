<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\NewsEvent;
use App\Models\LogAkses;

use DB;
use Auth;
use Image;
use Validator;

class NewsController extends Controller
{

    public function index()
    {

        $getNews = NewsEvent::where('news_event', 1)->get();

        return view('backend.news.index', compact('getNews'));
    }

    public function tambah()
    {
        return view('backend.news.tambah');
    }

    public function store(Request $request)
    {
        $message = [
          'judul.required' => 'This field is required.',
          'judul.unique' => 'This class category already taken.',
          'deskripsi.required' => 'This field is required.',
          'deskripsi.max' => 'Too long.',
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
          'judul' => 'required|max:25|unique:amd_news_event',
          'deskripsi'  => 'required|max:450',
          'img_banner'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=500,max_height=500',
          'img_thumb'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=300,max_height=300'
        ], $message);


        if($validator->fails()){
          return redirect()->route('news.tambah')->withErrors($validator)->withInput();
        }

        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image_banner = $request->file('img_banner');
        $img_url_banner = 'sportopia-'.str_slug($request->judul,'-'). '-banner.' . $image_banner->getClientOriginalExtension();
        Image::make($image_banner)->save('amadeo/images/news-event/'. $img_url_banner);

        $image_thumb = $request->file('img_thumb');
        $img_url_thumb = 'sportopia-'.str_slug($request->judul,'-'). '-thumb.' . $image_thumb->getClientOriginalExtension();
        Image::make($image_thumb)->save('amadeo/images/news-event/'. $img_url_thumb);

        $save = New NewsEvent;
        $save->news_event = 1;
        $save->judul = $request->judul;
        $save->deskripsi = nl2br($request->deskripsi);
        $save->img_banner = $img_url_banner;
        $save->img_banner_alt = 'sportopia-'.str_slug($request->judul,'-').'-banner';
        $save->img_thumb = $img_url_thumb;
        $save->img_thumb_alt = 'sportopia-'.str_slug($request->judul,'-').'-thumb';
        $save->flag_publish = $flag_publish;
        $save->tanggal_publish = $request->tanggal_publish_;
        $save->slug = str_slug($request->judul,'-');
        $save->actor = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Create New News '.$request->judul;
        $log->save();


        return redirect()->route('news.index')->with('berhasil', 'Your data has been successfully saved.');
    }

    public function ubah($id)
    {
        $get = NewsEvent::find($id);

        if(!$get){
          return view('backend.errors.404');
        }

        return view('backend.news.ubah', compact('get'));
    }

    public function edit(Request $request)
    {
        $message = [
          'judul.required' => 'This field is required.',
          'judul.unique' => 'This class category already taken.',
          'deskripsi.required' => 'This field is required.',
          'deskripsi.max' => 'Too long.',
          'img_banner.image' => 'Format not supported.',
          'img_banner.max' => 'File Size Too Big.',
          'img_banner.dimensions' => 'Pixel max 200px x 200px.',
          'img_thumb.image' => 'Format not supported.',
          'img_thumb.max' => 'File Size Too Big.',
          'img_thumb.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'judul' => 'required|max:25|unique:amd_news_event,judul,'.$request->id,
          'deskripsi'  => 'required|max:450',
          'img_banner'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=500,max_height=500',
          'img_thumb'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=500,max_height=500'
        ], $message);


        if($validator->fails()){
          return redirect()->route('news.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }

        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image_banner = $request->file('img_banner');
        $image_thumb = $request->file('img_thumb');

        $save = NewsEvent::find($request->id);
        $save->news_event = 1;
        $save->judul = $request->judul;
        $save->deskripsi = nl2br($request->deskripsi);
        if($image_banner){
          $img_url_banner = 'sportopia-'.str_slug($request->judul,'-'). '-banner.' . $image_banner->getClientOriginalExtension();
          Image::make($image_banner)->save('amadeo/images/news-event/'. $img_url_banner);
          $save->img_banner = $img_url_banner;
        }
        $save->img_banner_alt = 'sportopia-'.str_slug($request->judul,'-').'-banner';
        if($image_thumb){
          $img_url_thumb = 'sportopia-'.str_slug($request->judul,'-'). '-thumb.' . $image_thumb->getClientOriginalExtension();
          Image::make($image_thumb)->save('amadeo/images/news-event/'. $img_url_thumb);
          $save->img_thumb = $img_url_thumb;
        }
        $save->img_thumb_alt = 'sportopia-'.str_slug($request->judul,'-').'-thumb';
        $save->flag_publish = $flag_publish;
        $save->tanggal_publish = $request->tanggal_publish_;
        $save->slug = str_slug($request->judul,'-');
        $save->actor = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Edit Data News '.$request->judul;
        $log->save();


        return redirect()->route('news.index')->with('berhasil', 'Your data has been successfully updated.');
    }

    public function lihat($id)
    {
        $get = NewsEvent::find($id);

        if(!$get){
          return view('backend.errors.404');
        }

        return view('backend.news.lihat', compact('get'));
    }

    public function publish($id)
    {
        $set = NewsEvent::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          return redirect()->route('news.index')->with('berhasil', 'Successfully unpublished '.$set->judul);
        }else{
          $set->flag_publish = 1;
          $set->update();

          return redirect()->route('news.index')->with('berhasil', 'Successfully published '.$set->judul);
        }
    }
}
