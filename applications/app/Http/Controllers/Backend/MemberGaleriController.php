<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\MemberGaleri;
use App\Models\Kelas;
use App\Models\LogAkses;

use Auth;
use DB;
use Image;
use Input;
use Validator;
use File;

class MemberGaleriController extends Controller
{

    public function allGaleri()
    {
        $getGaleri = MemberGaleri::paginate(20);

        return view('backend.memberGaleri.allGaleri', compact('getGaleri'));
    }

    public function index($id)
    {
        $getGaleri = MemberGaleri::where('id_member', $id)->get();
        $id_member = $id;

        return view('backend.memberGaleri.index', compact('getGaleri', 'id_member'));

    }

    public function store(Request $request)
    {
        $message = [
          'id_member.required' => 'This field is required.',
          'img_url.*.image' => 'Format not supported.',
          'img_url.*.max' => 'File Size Too Big. Max 4Mb each photo',
          'img_url.*.dimensions' => 'Pixel max 1800px x 1000px each photo.',
        ];

        $validator = Validator::make($request->all(), [
          'id_member' => 'required',
          'img_url.*'  => 'image|max:4000|mimes:jpeg,bmp,png|dimensions:max_width=1800,max_height=1000',
        ], $message);


        if($validator->fails()){
          return redirect()->route('memberGaleri.index', ['id' => $request->id_member])->withErrors($validator)->withInput();
        }

        if($request->hasFile('img_url')){
          DB::transaction(function() use($request){
            $pathUpload = 'amadeo/images/gallery/';
            $member = Member::find($request->id_member);

            foreach($request->file('img_url') as $file10_ )
            {
              $salt = rand(1000,9999);
              $file10 = $member->kode_member.' - '.$salt.' - '. $file10_->getClientOriginalName();
              $file10_->move($pathUpload, $file10);

              $save = New MemberGaleri;
              $save->id_member = $request->id_member;
              $save->img_url = $file10;
              $save->img_alt = 'Sportopia - '.$file10;
              $save->save();
            }

            $log = new LogAkses;
            $log->actor = auth()->guard('admin')->id();
            $log->aksi = 'Upload New Image Gallery on '.$member->kode_member;
            $log->save();
          });

        }

        return redirect()->route('memberGaleri.index', ['id' => $request->id_member])->with('berhasil', 'Your data has been successfully saved.');
    }

    public function delete($id)
    {
        $getImage = MemberGaleri::find($id);

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

        return redirect()->route('memberGaleri.index', ['id' => $getImage->id_member])->with('berhasil', 'Your image has been successfully deleted.');
    }

    public function deletee($id)
    {
        $getImage = MemberGaleri::find($id);

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

        return redirect()->route('memberGaleri.allGaleri')->with('berhasil', 'Your image has been successfully deleted.');
    }


}
