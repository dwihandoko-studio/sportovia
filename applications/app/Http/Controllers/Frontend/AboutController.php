<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tentang;
use App\Models\Staff;
use App\Models\StaffJabatan;

class AboutController extends Controller
{
    function us(){
    	$call = Tentang::select(
            'deskripsi_tentang', 
            'img_visi', 
            'visi', 
            'img_misi',
            'misi'
        )
        ->first();

	    return view('frontend.about-page.us', compact(
	    	'call'
	    ));
	}

	function staff(){
		
		$call_st = Staff::leftJoin('amd_staff_jabatan', 'amd_staff_jabatan.id', '=', 'amd_staff.id_jabatan')
        ->select(
            'nama_staff',
            'quotes_staff', 
            'nama_jabatan',
            'avatar'
        )
        ->where('amd_staff.flag_publish', '1')
        ->where('amd_staff_jabatan.flag_publish', '1')
        ->whereIn('id_jabatan', [1, 4])
        ->orderby('nama_jabatan', 'asc')
        ->get();
        
        $call_nd = Staff::leftJoin('amd_staff_jabatan', 'amd_staff_jabatan.id', '=', 'amd_staff.id_jabatan')
        ->select(
            'nama_staff',
            'nama_jabatan',
            'avatar'
        )
        ->where('amd_staff.flag_publish', '1')
        ->where('amd_staff_jabatan.flag_publish', '1')
        ->whereNotIn('id_jabatan', [1, 4])
        ->orderby('nama_jabatan', 'asc')
        ->get();

	    return view('frontend.about-page.staff', compact(
	    	'call_st',
	    	'call_nd'
	    ));
	}
	
}
