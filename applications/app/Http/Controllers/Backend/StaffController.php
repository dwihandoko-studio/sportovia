<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Staff;
use App\Models\StaffJabatan;
use App\Models\LogAkses;

use DB;
use Auth;
use Image;
use Validator;


class StaffController extends Controller
{

    public function index()
    {
        $getJabatan = StaffJabatan::get();

        return view('backend.staff.staff-jabatan', compact('getJabatan'));
    }

    public function store(Request $request)
    {
        $message = [
          'nama_jabatan.required' => 'This field is required.',
          'nama_jabatan.unique' => 'This staff position already taken.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_jabatan' => 'required|max:25|unique:amd_staff_jabatan'
        ], $message);

        if($validator->fails()){
          return redirect()->route('staff-jabatan.index')->withErrors($validator)->withInput();
        }

        $save = New StaffJabatan;
        $save->nama_jabatan = $request->nama_jabatan;
        $save->actor = 1;
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Adding New Staff Position '.$request->nama_jabatan;
        $log->save();

        return redirect()->route('staff-jabatan.index')->with('berhasil', 'Your data has been successfully saved.');
    }

    public function ubah($id)
    {
        $getJabatan = StaffJabatan::find($id);

        return $getJabatan;
    }

    public function edit(Request $request)
    {
      $message = [
        'edit_nama_jabatan.required' => 'This field is required.',
        'edit_nama_jabatan.unique' => 'This staff position already taken.',
      ];

      $validator = Validator::make($request->all(), [
        'edit_nama_jabatan' => 'required|max:25|unique:amd_staff_jabatan,nama_jabatan,'.$request->id_edit,
      ], $message);

      if($validator->fails()){
        return redirect()->route('staff-jabatan.index')->withErrors($validator)->withInput();
      }

      $update = StaffJabatan::find($request->id_edit);
      $update->nama_jabatan = $request->edit_nama_jabatan;
      $update->actor = 1;
      $update->update();

      $log = new LogAkses;
      $log->actor = 1;
      $log->aksi = 'Edit Staff Position '.$request->edit_nama_jabatan;
      $log->save();

      return redirect()->route('staff-jabatan.index')->with('berhasil', 'Your data has been successfully updated.');

    }

    public function publish($id)
    {
        $set = StaffJabatan::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          return redirect()->route('staff-jabatan.index')->with('berhasil', 'Successfully unpublished '.$set->nama_jabatan);
        }else{
          $set->flag_publish = 1;
          $set->update();

          return redirect()->route('staff-jabatan.index')->with('berhasil', 'Successfully published '.$set->nama_jabatan);
        }
    }



    public function staffIndex()
    {
        $getStaff = Staff::join('amd_staff_jabatan', 'amd_staff_jabatan.id', '=', 'amd_staff.id_jabatan')
                          ->select('amd_staff.*', 'amd_staff_jabatan.nama_jabatan as nama_jabatan')
                          ->get();

        return view('backend.staff.index', compact('getStaff'));
    }

    public function staffTambah()
    {
        $getJabatan = StaffJabatan::where('flag_publish', 1)->get();

        return view('backend.staff.tambah', compact('getJabatan'));
    }

    public function staffStore(Request $request)
    {
        $message = [
          'nama_staff.required' => 'This field is required.',
          'id_jabatan.required' => 'This field is required.',
          'avatar.image' => 'Format not supported.',
          'avatar.max' => 'File Size Too Big.',
          'avatar.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_staff' => 'required|max:25',
          'id_jabatan'  => 'required',
          'avatar'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=200,max_height=200'
        ], $message);


        if($validator->fails()){
          return redirect()->route('pegawai.tambah')->withErrors($validator)->withInput();
        }


        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image = $request->file('avatar');

        $save = New Staff;
        $save->nama_staff = $request->nama_staff;
        $save->id_jabatan = $request->id_jabatan;
        $save->quotes_staff = $request->quotes_staff;
        $save->avatar_alt = $request->nama_staff;
        $save->flag_publish = $flag_publish;
        $save->actor = 1;
        if($image){
          $img_url = 'sportopia-'.str_slug($request->nama_staff,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->save('amadeo/images/users/'. $img_url);
          $save->avatar = $img_url;
        }
        $save->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Create New Staff '.$request->nama_staff;
        $log->save();


        return redirect()->route('pegawai.index')->with('berhasil', 'Your data has been successfully saved.');

    }

    public function staffUbah($id)
    {
        $getStaff = Staff::find($id);

        if(!$getStaff){
          return view('backend.errors.404');
        }

        $getJabatan = StaffJabatan::where('flag_publish', 1)->get();

        return view('backend.staff.ubah', compact('getStaff', 'getJabatan'));

    }

    public function staffEdit(Request $request)
    {
        $message = [
          'nama_staff.required' => 'This field is required.',
          'id_jabatan.required' => 'This field is required.',
          'avatar.image' => 'Format not supported.',
          'avatar.max' => 'File Size Too Big.',
          'avatar.dimensions' => 'Pixel max 200px x 200px.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_staff' => 'required|max:25',
          'id_jabatan'  => 'required',
          'avatar'  => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=200,max_height=200'
        ], $message);


        if($validator->fails()){
          return redirect()->route('pegawai.edit', array('id' => $request->id))->withErrors($validator)->withInput();
        }

        if($request->flag_publish == 'on'){
          $flag_publish = 1;
        }else{
          $flag_publish = 0;
        }

        $image = $request->file('avatar');

        $update = Staff::find($request->id);
        $update->nama_staff = $request->nama_staff;
        $update->id_jabatan = $request->id_jabatan;
        $update->quotes_staff = $request->quotes_staff;
        $update->avatar_alt = $request->nama_staff;
        $update->flag_publish = $flag_publish;
        $update->actor = 1;
        if($image){
          $img_url = 'sportopia-'.str_slug($request->nama_staff,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->save('amadeo/images/users/'. $img_url);
          $update->avatar = $img_url;
        }
        $update->save();

        $log = new LogAkses;
        $log->actor = 1;
        $log->aksi = 'Edit Data Staff '.$request->nama_staff;
        $log->save();


        return redirect()->route('pegawai.index')->with('berhasil', 'Your data has been successfully updated.');

    }


    public function staffPublish($id)
    {
        $set = Staff::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == 1) {
          $set->flag_publish = 0;
          $set->update();

          return redirect()->route('pegawai.index')->with('berhasil', 'Successfully unpublished '.$set->nama_staff);
        }else{
          $set->flag_publish = 1;
          $set->update();

          return redirect()->route('pegawai.index')->with('berhasil', 'Successfully published '.$set->nama_staff);
        }
    }
}
