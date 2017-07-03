<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\LogAkses;

use DB;
use Auth;
use Validator;
use Hash;
use Mail;
use Image;

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
          'img_member.required' => 'This field is required.',
          'img_member.image' => 'Format not supported.',
          'img_member.max' => 'File Size Too Big.',
          'img_member.dimensions' => 'Pixel max 250px x 250px.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_member' => 'required',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required',
          'tanggal_gabung' => 'required',
          'alamat' => 'required',
          'img_member' => 'required|image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=250,max_height=250'
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

        $salt = rand(100,999);
        $image = $request->file('img_member');
        if($image){
          $img_url = 'sportopia-'.str_slug($request->kode_member,'-').'-'.$salt.'.' . $image->getClientOriginalExtension();
          Image::make($image)->save('amadeo/images/users/'. $img_url);
        }else{
          $img_url = null;
        }

        DB::transaction(function() use($request, $email, $anak_member, $img_url){
          $member = Member::create([
            'anak_member' => $anak_member,
            'kode_member' => $request->kode_member,
            'nama_member' => $request->nama_member,
            'img_member'  => $img_url,
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


            $data = array([
                'name' => $request->nama_member,
                'email' => $request->email,
                'password' => $request->kode_member
              ]);

            Mail::send('backend.email.member', ['data' => $data], function($message) use ($data) {
              $message->from('administrator@sportopia.com', 'Administrator')
                      ->to($data[0]['email'], $data[0]['name'])
                      ->subject('Account Sportopia');
            });

          }

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Add new member '.$request->nama_member;
          $log->save();
        });


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
          'img_member.image' => 'Format not supported.',
          'img_member.max' => 'File Size Too Big.',
          'img_member.dimensions' => 'Pixel max 250px x 250px.',
        ];

        $validator = Validator::make($request->all(), [
          'nama_member' => 'required',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required',
          'tanggal_gabung' => 'required',
          'alamat' => 'required',
          'img_member' => 'image|mimes:jpeg,bmp,png|max:1000|dimensions:max_width=250,max_height=250'
        ], $message);

        if($validator->fails()){
          return redirect()->route('member.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }

        $salt = rand(100,999);
        $image = $request->file('img_member');
        if($image){
          $img_url = 'sportopia-'.str_slug($request->kode_member,'-').'-'.$salt.'.' . $image->getClientOriginalExtension();
          Image::make($image)->save('amadeo/images/users/'. $img_url);
        }else{
          $img_url = null;
        }

        $update = Member::find($request->id);
        $update->nama_member = $request->nama_member;
        $update->img_member = $img_url;
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

    public function lihatJadwal($id)
    {
        $getJadwal = Jadwal::where('id_member', $id)->get();

        return view('backend.member.lihatJadwal', compact('getJadwal'));
    }

    public function status($id)
    {
        $set = Jadwal::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_status == 1) {
          $set->flag_status = 0;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Deactivated Member Class '.$set->member->kode_member.' - '.$set->member->nama_member;
          $log->save();

          return redirect()->route('member.lihatJadwal', ['id' => $set->id_member ])->with('berhasil', 'Successfully deactivated '.$set->nama_member);
        }else{
          $set->flag_status = 1;
          $set->update();

          $log = new LogAkses;
          $log->actor = auth()->guard('admin')->id();
          $log->aksi = 'Acivated Member Class '.$set->member->kode_member.' - '.$set->member->nama_member;
          $log->save();

          return redirect()->route('member.lihatJadwal', ['id' => $set->id_member ])->with('berhasil', 'Successfully activated '.$set->nama_member);
        }
    }
}
