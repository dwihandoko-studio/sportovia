<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\Jadwal;

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
    	->select(
    		'id_member',
    		'kode_member',
    		'nama_member',
    		'tempat_lahir',
    		'tanggal_lahir',
    		'alamat',
    		'nama_kelas',
    		'jam_mulai',
    		'jam_akhir',
    		'hari'
    	)
    	->where('amd_member.flag_status', '1')
    	->where('amd_jadwal.flag_status', '1')
    	->where('amd_kelas_ruang.flag_publish', '1')
    	->where('id_member', auth()->guard('user')->user()->id_member)
    	->orWhere('anak_member', auth()->guard('user')->user()->id_member)
    	->orderBy('id_member')
    	->get();

	    return view('frontend.member-page.index', compact(
	    	'call'
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
    		'amd_kelas_ruang', 
    		'amd_kelas_ruang.id', 
    		'=', 
    		'amd_jadwal.id_kelas_ruang'
    	)
    	->select(
    		'id_member',
    		'kode_member',
    		'nama_member',
    		'tempat_lahir',
    		'tanggal_lahir',
    		'alamat',
    		'nama_kelas',
    		'link_cctv',
    		'jam_mulai',
    		'jam_akhir',
    		'hari'
    	)
    	->where('amd_member.flag_status', '1')
    	->where('amd_jadwal.flag_status', '1')
    	->where('amd_kelas_ruang.flag_publish', '1')
    	->where('kode_member', $slug)
    	->first();

	    return view('frontend.member-page.view', compact(
	    	'call'
	    ));
	}

}
