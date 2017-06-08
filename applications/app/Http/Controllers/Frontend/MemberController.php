<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    		'tempat_lahir',
    		'tanggal_lahir',
    		'alamat',
            'amd_kelas_ruang.nama_kelas as nama_ruang',
            'amd_kelas.nama_kelas as nama_kelas',
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
            'dokumen_rapot',
            'link_cctv'
        )
    	->where('amd_member.flag_status', '1')
    	->where('amd_jadwal.flag_status', '1')
    	->where('amd_kelas_ruang.flag_publish', '1')
    	->where('amd_jadwal.id', $slug)
    	->first();

	    return view('frontend.member-page.view', compact(
	    	'call'
	    ));
	}

}
