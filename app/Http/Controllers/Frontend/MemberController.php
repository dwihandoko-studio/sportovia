<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Member;
use App\Models\MemberGaleri;
use App\Models\ConfigContent;

use Auth;
use Validator;
use Hash;

class MemberController extends Controller
{
    function index(){
    	$call = Jadwal::leftJoin(
    		'amd_member',
    		'amd_member.id',
    		'=',
    		'amd_jadwal.id_member'
    	)
    	->leftJoin(
    		'amd_kelas_ruang',
    		'amd_kelas_ruang.id',
    		'=',
    		'amd_jadwal.id_kelas_ruang'
    	)
        ->leftJoin(
            'amd_kelas',
            'amd_kelas.id',
            '=',
            'amd_jadwal.id_kelas'
        )
    	->select(
    		'amd_jadwal.id as id_jadwal',
    		'kode_member',
            'nama_member',
    		'img_member',
    		'tempat_lahir',
    		'tanggal_lahir',
    		'alamat',
            'amd_kelas_ruang.nama_kelas as nama_ruang',
            'amd_kelas.nama_kelas as nama_kelas',
    		'jam_mulai',
    		'jam_akhir',
    		'hari',
            'anak_member'
    	)
    	->where('amd_member.flag_status', '1')
    	->where('amd_jadwal.flag_status', '1')
    	->where('amd_kelas_ruang.flag_publish', '1')
    	->where('id_member', auth()->guard('user')->user()->id_member)
    	->orWhere('anak_member', auth()->guard('user')->user()->id_member)
    	->orderBy('id_member')
    	->get();

        $callConfigContent4 = ConfigContent::find(4);


	    return view('frontend.member-page.index', compact(
	    	'call',
            'callConfigContent4'
	    ));
	}

	function view($slug){
		$call = Jadwal::leftJoin(
    		'amd_member',
    		'amd_member.id',
    		'=',
    		'amd_jadwal.id_member'
    	)
    	->leftJoin(
            'amd_kelas',
            'amd_kelas.id',
            '=',
            'amd_jadwal.id_kelas'
        )
        ->leftJoin(
            'amd_kelas_program',
            'amd_kelas_program.id',
            '=',
            'amd_kelas.id_program'
        )
        ->leftJoin(
            'amd_kelas_kategori',
            'amd_kelas_kategori.id',
            '=',
            'amd_kelas.id_kelas_kategori'
        )
        ->leftJoin(
            'amd_kelas_ruang',
            'amd_kelas_ruang.id',
            '=',
            'amd_jadwal.id_kelas_ruang'
        )
        ->select(
            'kode_member',
            'nama_member',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'program_kelas',
            'kategori_kelas',
            'amd_kelas.nama_kelas as nama_kelas',
            'amd_kelas_ruang.nama_kelas as nama_ruang',
            'lantai_kelas',
            'jam_mulai',
            'jam_akhir',
            'hari',
            'amd_jadwal.dokumen_rapot as dokumen_rapot',
            'link_cctv'
        )
    	->where('amd_member.flag_status', '1')
    	->where('amd_jadwal.flag_status', '1')
    	->where('amd_kelas_ruang.flag_publish', '1')
    	->where('amd_jadwal.id', $slug)
    	->first();

        $callMember = Member::select(
                'id'
            )
        ->where('anak_member', auth()->guard('user')->user()->id_member)
        ->get();

        $arr  = array();
        
        foreach ($callMember as $key => $value) {
            array_push($arr, $value->id);
        }
        array_push($arr, auth()->guard('user')->user()->id_member);

        $callPhoto = MemberGaleri::select(
                'img_url'
            )
        ->whereIn('id_member', $arr)
        ->get();

	    return view('frontend.member-page.view', compact(
            'call',
	    	'callPhoto'
	    ));
	}

    public function changePassword(Request $request){
        $getUser = User::find($request->id);

        $messages = [
          'old_password.required' => "You must enter the old password",
          'new_password.required' => "You must enter the new password",
          'new_password.min' => "Too short",
          'confirm_password.required' => "You must enter the new password confirmation",
          'confirm_password.confirmed' => "Password don't match",
        ];

        $validator = Validator::make($request->all(), [
          'old_password' => 'required',
          'new_password' => 'required|min:6',
          'confirm_password' => 'required|same:new_password'
        ], $messages);

        if ($validator->fails()) {
          return redirect()->route('frontend.member.index')->withErrors($validator)->withInput();
        }

        if(Hash::check($request->old_password, $getUser->password))
        {
          $getUser->password = Hash::make($request->new_password);
          $getUser->update();

          return redirect()->route('frontend.member.index')->with('info-password', "Your password successfully changed.");
        }
        else {
          return redirect()->route('frontend.member.index')->with('info-password', 'Your old password did not match');
        }
    }
}
