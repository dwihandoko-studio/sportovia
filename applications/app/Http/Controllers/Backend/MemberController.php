<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\User;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Hash;

class MemberController extends Controller
{

    public function index()
    {
        $getMember = Member::get();

        return view('backend.member.index', compact('getMember', 'getAnak'));
    }

    public function getKid($id)
    {
        $getKid = Member::where('anak_member', $id)->get();

        return $getKid;
    }

    public function tambah()
    {
        $tahun = date('y');
        $bulan = date('m');
        $rand = rand(10,9999);

        $kode_member = 'SPT-'.$tahun.'-'.$bulan.'-'.$rand;

        $cek_kode = Member::where('kode_member', $kode_member)->first();

        if(!$cek_kode){
          $kode_member;
        }else{
          $kode_member = 'Member Code is Empty - Contact Amadeo Please';
        }

        $getOrangTua = Member::where('anak_member', '=', null)->get();

        return view('backend.member.tambah', compact('getOrangTua', 'kode_member'));
    }

    public function store(Request $request)
    {
        $message = [
          'nama_member.required' => 'This field is required.',
          'tempat_lahir.required' => 'This field is required.',
          'tanggal_lahir.required' => 'This field is required.',
          'tanggal_gabung.required' => 'This field is required.',
          'alamat.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_member' => 'required',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required',
          'tanggal_gabung' => 'required',
          'alamat' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('member.tambah')->withErrors($validator)->withInput();
        }


        if($request->anak_member){
          $anak_member = $request->anak_member;
        }else{
          $anak_member = null;
        }

        if($request->email){
          $email = $request->email;
        }else{
          $email = null;
        }

        $member = Member::create([
          'anak_member' => $anak_member,
          'kode_member' => $request->kode_member,
          'nama_member' => $request->nama_member,
          'email' => $email,
          'tempat_lahir' => $request->tempat_lahir,
          'tanggal_lahir' => $request->tanggal_lahir,
          'tanggal_gabung' => $request->tanggal_gabung,
          'alamat' => $request->alamat,
          'flag_status' => 1,
          'aktor' => auth()->guard('admin')->id()
        ]);

        if($request->id_program == 1){
          $user = new User;
          $user->id_member = $member->id;
          $user->name = $request->nama_member;
          $user->email  = $email;
          $user->password = Hash::make($request->kode_member);
          $user->confirmed = 1;
          $user->flag_status = 1;
          $user->role_id = 3;
          $user->login_count = 0;
          $user->save();
        }

        $log = new LogAkses;
        $log->actor = auth()->guard('admin')->id();
        $log->aksi = 'Adding member '.$request->nama_member;
        $log->save();

        return redirect()->route('member.index')->with('berhasil', 'Your new member has been successfully saved.');
    }

    public function getMember($id)
    {
        $getMember = Member::find($id);

        $checkParent = Member::where('id', '=', $getMember->anak_member)->first();

        return view('backend.member.ubah', compact('getMember', 'checkParent'));
    }

    public function edit(Request $request)
    {
        $message = [
          'nama_member.required' => 'This field is required.',
          'tempat_lahir.required' => 'This field is required.',
          'tanggal_lahir.required' => 'This field is required.',
          'tanggal_gabung.required' => 'This field is required.',
          'alamat.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_member' => 'required',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required',
          'tanggal_gabung' => 'required',
          'alamat' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('member.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }

        $update = Member::find($request->id);
        $update->nama_member = $request->nama_member;
        $update->tempat_lahir = $request->tempat_lahir;
        $update->tanggal_lahir = $request->tanggal_lahir;
        $update->tanggal_gabung = $request->tanggal_gabung;
        $update->alamat = $request->alamat;
        if($request->has('email')){
          $update->email = $request->email;
        }
        $update->update();

        if($request->has('email')){
          User::where('id_member', '=', $request->id)->update(array('email' => $request->email));
        }

        return redirect()->route('member.index')->with('berhasil', 'Your data member has been successfully updated.');
    }
}
