<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AdsBanner;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Image;

class AdsBannerController extends Controller
{

      public function index()
      {
          $getAds = AdsBanner::get();

          return view('backend.adsbanner.index', compact('getAds'));
      }

      public function store(Request $request)
      {
        $message = [
          'ads_judul.required' => 'This field is required.',
          'ads_judul.unique' => 'This class category already taken.',
          'img_url.image' => 'Format not supported.',
          'img_url.required' => 'This field is required.',
          'img_url.max' => 'File Size Too Big.',
          'img_url.dimensions' => 'Pixel max 847px x 627px.',
          'tanggal_publish.required' => 'This field is required.',
          'img_alt.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'ads_judul' => 'required|max:25|unique:amd_ads_banner',
          'img_url'  => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=850,max_height=650',
          'img_alt' => 'required',
          'tanggal_publish' => 'required',
        ], $message);


        if($validator->fails()){
          return redirect()->route('ads.index')->withErrors($validator)->withInput();
        }

        $salt = rand(100,999);

        $img_url = $request->file('img_url');
        $img_url_banner = 'sportopia-'.str_slug($request->ads_judul,'-'). '-banner-'.$salt.'.'. $img_url->getClientOriginalExtension();
        Image::make($img_url)->save('amadeo/images/ads/'. $img_url_banner);

        $save = new AdsBanner;
        $save->ads_judul = $request->ads_judul;
        $save->img_url = $img_url_banner;
        $save->img_alt = $request->img_alt;
        $save->tanggal_publish = $request->tanggal_publish;
        $save->flag_publish = 1;
        $save->actor = auth()->guard('admin')->id();
        $save->save();


        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Create New Ads Banner '.$request->ads_judul;
        $log->save();


        return redirect()->route('ads.index')->with('berhasil', 'Your data has been successfully saved.');

      }

      public function ubah($id)
      {
          $getAds = AdsBanner::find($id);

          if(!$getAds){
            return view('backend.errors.404');
          }

          return $getAds;
      }

      public function edit($id)
      {
          
      }

      public function publish($id)
      {
          $set = AdsBanner::find($id);

          if(!$set){
            return view('backend.errors.404');
          }

          if ($set->flag_publish == 1) {
            $set->flag_publish = 0;
            $set->update();

            $log = new LogAkses;
            $log->actor = auth()->guard('admin')->id();
            $log->aksi = 'Unpublish Data Ads Banner '.$set->ads_judul;
            $log->save();

            return redirect()->route('ads.index')->with('berhasil', 'Successfully unpublished '.$set->ads_judul);
          }else{
            $set->flag_publish = 1;
            $set->update();

            $log = new LogAkses;
            $log->actor = auth()->guard('admin')->id();
            $log->aksi = 'Publish Data Ads Banner '.$set->ads_judul;
            $log->save();

            return redirect()->route('ads.index')->with('berhasil', 'Successfully published '.$set->ads_judul);
          }
      }



}
